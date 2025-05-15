<?php

declare(strict_types=1);

namespace Safe\Templating;

use Safe\Templating\Exception\InvalidPlaceholderException;
use Safe\Templating\Exception\TemplateNotFoundException;
use Safe\Templating\Exception\TemplatingException;
use Safe\Templating\Exception\UnreadableTemplateException;
use Symfony\Component\Finder\Finder;

final class Engine
{
    /**
     * @var string[] $templates
     */
    private array $templates;

    public function __construct()
    {
        $finder = Finder::create()->files()->name('*.php.tpl')->in(self::basePath());
        $this->templates = array_map(fn(\SplFileInfo $file) => str_replace(self::basePath() . '/', '', $file->getRealPath()), \iterator_to_array($finder->getIterator()));
    }

    /**
     * @param array<string, string> $context
     *
     * @throws TemplatingException
     */
    public function generate(string $template, array $context = []): string
    {
        if (!$this->hasTemplate($template)) {
            throw new TemplateNotFoundException(\sprintf('Template "%s" not found.', $template));
        }

        if (false === $content = file_get_contents(self::basePath() . '/' . $template)) {
            throw new UnreadableTemplateException(\sprintf('Could not read template "%s".', $template));
        }

        foreach ($context as $placeholder => $replacement) {
            if (!\is_string($replacement)) {
                throw new InvalidPlaceholderException(\sprintf('Placeholder "%s" must be a string.', $placeholder));
            }

            $content = str_replace($placeholder, $replacement, $content);
        }

        return $content;
    }

    private function hasTemplate(string $name): bool
    {
        return 0 < \count(\array_filter($this->templates, static fn(string $template) => $template === $name));
    }

    private static function basePath(): string
    {
        return Filesystem::generatorDir().'/templates';
    }
}
