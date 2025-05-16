<?php

declare(strict_types=1);

namespace Safe\Templating;

final class Filesystem
{
    private function __construct()
    {
    }

    public static function projectRootDir(): string
    {
        $path = realpath(__DIR__ . '/../../..');

        if (false === $path) {
            throw new \RuntimeException('Unable to locate root directory');
        }

        return $path;
    }

    public static function generatorDir(): string
    {
        return \sprintf(self::projectRootDir().'/generator');
    }

    public static function outputDir(): string
    {
        return \sprintf(self::projectRootDir().'/generated');
    }

    public static function dumpFile(string $targetPath, string $content): void
    {
        $result = file_put_contents($targetPath, $content);

        if (false === $result) {
            throw new \RuntimeException(\sprintf('Could not write to "%s".', $targetPath));
        }
    }
}
