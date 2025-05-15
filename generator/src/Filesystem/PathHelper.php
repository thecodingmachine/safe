<?php

declare(strict_types=1);

namespace Safe\Filesystem;

final class PathHelper
{
    public static function projectRootDir(): string
    {
        $path = realpath(__DIR__ . '/../../..');

        if (false === $path) {
            throw new \RuntimeException('Unable to locate root directory');
        }

        return $path;
    }

    public static function docsDirectory(): string
    {
        return \sprintf('%s/generator/docs', self::projectRootDir());
    }

    private function __construct()
    {
    }
}
