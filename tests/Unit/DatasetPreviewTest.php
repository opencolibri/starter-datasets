<?php

declare(strict_types=1);

namespace OpenColibri\Starter\Datasets\Tests\Unit;

use OpenColibri\Starter\Datasets\DatasetPreview;
use PHPUnit\Framework\TestCase;

final class DatasetPreviewTest extends TestCase
{
    public function testEveryReadyMadeDatasetHasAThumbnail(): void
    {
        $datasets = array_map(basename(...), glob(DatasetPreview::datasetsDir() . '/*', \GLOB_ONLYDIR) ?: []);

        static::assertNotEmpty($datasets);

        foreach ($datasets as $dataset) {
            static::assertNotNull(DatasetPreview::path($dataset), \sprintf('The "%s" dataset has no thumbnail: run "castor datasets:thumbnails".', $dataset));
        }
    }

    public function testItHasNoThumbnailForAnUnknownDataset(): void
    {
        static::assertNull(DatasetPreview::path('my-imported-shop'));
        static::assertNull(DatasetPreview::path('../cellar'));
    }
}
