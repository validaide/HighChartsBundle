<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Symfony\Set\SymfonyLevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->importNames();
    $rectorConfig->importShortClasses();
    $rectorConfig->paths([
        __DIR__ . '/DependencyInjection',
        __DIR__ . '/Graph',
        __DIR__ . '/Templating',
        __DIR__ . '/Tests',
        __DIR__ . '/Twig',
        __DIR__ . '/ValueObject',
        __DIR__ . '/Graph.php',
        __DIR__ . '/HighChartsBundle.php',
        __DIR__ . '/HighChartsException.php',
    ]);

    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_74,
        SymfonyLevelSetList::UP_TO_SYMFONY_54,
        PHPUnitLevelSetList::UP_TO_PHPUNIT_90
    ]);
};
