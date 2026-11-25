<?php

declare(strict_types=1);

namespace Safe\Commands;

use Safe\Filesystem\PathHelper;
use Safe\VersionManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

final class UpdateVersionsCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('update-versions')
            ->setDescription('Pull the PHP documentation and update the latest PHP version commits.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $versions = VersionManager::load();
        $latestVersion = VersionManager::latestVersion($versions);
        $repositories = [
            'doc-en' => PathHelper::docsDirectory().'/php/doc-en',
            'doc-base' => PathHelper::docsDirectory().'/php/doc-base',
        ];

        foreach ($repositories as $repository => $directory) {
            $this->pull($directory);
            $versions[$latestVersion][$repository] = $this->getHead($directory);
        }

        VersionManager::save($versions);
        $output->writeln(\sprintf('Updated PHP %s in %s', $latestVersion, VersionManager::path()));

        return self::SUCCESS;
    }

    private function pull(string $directory): void
    {
        $process = new Process(['git', 'pull', '--ff-only'], $directory);
        $process->setTimeout(600);
        $code = $process->run();
        if (0 !== $code) {
            throw new \RuntimeException("Failed to git-pull in $directory (exit $code):\n{$process->getErrorOutput()}");
        }
    }

    private function getHead(string $directory): string
    {
        $process = new Process(['git', 'rev-parse', 'HEAD'], $directory);
        $process->setTimeout(10);
        $code = $process->run();
        if (0 !== $code) {
            throw new \RuntimeException("Failed to get the current commit in $directory (exit $code):\n{$process->getErrorOutput()}");
        }

        return \trim($process->getOutput());
    }
}
