<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\Filesystem\PathHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressIndicator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

final class DownloadDocsCommand extends Command
{
    private SymfonyStyle $io;
    private Filesystem $filesystem;

    protected function configure(): void
    {
        $this
            ->setName('download-docs')
            ->setDescription('Download the recent version of the PHP documentation')
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
        $this->filesystem = new Filesystem();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->io->title($this->getDescription());

        // Clean up before cloning.
        $this->filesystem->remove(PathHelper::docsDirectory());
        $this->filesystem->mkdir(PathHelper::docsDirectory());

        $this->clone($output, 'salathe/phpdoc-base');
        $this->clone($output, 'php/doc-en');

        return self::SUCCESS;
    }

    private function clone(OutputInterface $output, string $repository): void
    {
        $progressIndicator = new ProgressIndicator($output);
        $progressIndicator->start(\sprintf('Cloning <info>%s</info>', $repository));

        $process = new Process(['git', 'clone', \sprintf('https://github.com/%s', $repository), \sprintf('%s/%s', PathHelper::docsDirectory(), $repository)]);
        $process->start();

        while ($process->isRunning()) {
            $progressIndicator->advance();
        }

        $progressIndicator->finish(\sprintf('Downloaded <info>%s</info>', $repository));
    }
}
