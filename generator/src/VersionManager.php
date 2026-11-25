<?php

declare(strict_types=1);

namespace Safe;

final class VersionManager
{
    /**
     * @return array<string, array{doc-en: string, doc-base: string}>
     */
    public static function load(): array
    {
        $contents = \file_get_contents(self::path());
        if (false === $contents) {
            throw new \RuntimeException('Unable to read '.self::path());
        }

        try {
            $versions = \json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $exception) {
            throw new \RuntimeException('Unable to decode '.self::path().': '.$exception->getMessage(), 0, $exception);
        }

        if (!\is_array($versions) || [] === $versions) {
            throw new \RuntimeException(self::path().' must contain at least one PHP version');
        }

        $normalizedVersions = [];
        foreach ($versions as $version => $commits) {
            if (!\is_string($version) || !\is_array($commits)
                || !isset($commits['doc-en'], $commits['doc-base'])
                || !\is_string($commits['doc-en']) || !\is_string($commits['doc-base'])
            ) {
                throw new \RuntimeException(\sprintf('Invalid version entry %s in %s', (string) $version, self::path()));
            }

            $normalizedVersions[$version] = [
                'doc-en' => $commits['doc-en'],
                'doc-base' => $commits['doc-base'],
            ];
        }

        return $normalizedVersions;
    }

    /**
     * @param array<string, array{doc-en: string, doc-base: string}> $versions
     */
    public static function save(array $versions): void
    {
        try {
            $contents = \json_encode($versions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR)."\n";
        } catch (\JsonException $exception) {
            throw new \RuntimeException('Unable to encode versions: '.$exception->getMessage(), 0, $exception);
        }

        if (false === \file_put_contents(self::path(), $contents)) {
            throw new \RuntimeException('Unable to write '.self::path());
        }
    }

    /**
     * @param array<string, array{doc-en: string, doc-base: string}> $versions
     */
    public static function latestVersion(array $versions): string
    {
        $versionNumbers = \array_keys($versions);
        \usort($versionNumbers, static fn (string $left, string $right): int => \version_compare($left, $right));

        return (string) \end($versionNumbers);
    }

    public static function path(): string
    {
        return \dirname(__DIR__).'/versions.json';
    }

    private function __construct()
    {
    }
}
