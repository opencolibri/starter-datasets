<?php

declare(strict_types=1);

namespace OpenColibri\Starter\Datasets;

/**
 * Thumbnails of the ready-made datasets, for dataset lists: the image of the first product of each dataset, scaled
 * down (previews/<dataset>.webp, 240x320). They are made by "castor datasets:thumbnails".
 */
final class DatasetPreview
{
    public const WIDTH = 240;

    public const HEIGHT = 320;

    public static function dir(): string
    {
        return \dirname(__DIR__) . '/previews';
    }

    public static function datasetsDir(): string
    {
        return \dirname(__DIR__) . '/datasets';
    }

    /**
     * @return string|null the thumbnail file, or null when the dataset has none (not a ready-made one)
     */
    public static function path(string $dataset): ?string
    {
        if (!preg_match('/^[a-z0-9][a-z0-9_-]*$/', $dataset)) {
            return null;
        }

        $path = self::dir() . '/' . $dataset . '.webp';

        return is_file($path) ? $path : null;
    }
}
