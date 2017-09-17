<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6e9b1f402e6b80688306cdda72434806
{
    public static $files = array (
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
            'Spatie\\TemporaryDirectory\\' => 26,
            'Spatie\\Image\\' => 13,
            'Spatie\\ImageOptimizer\\' => 22,
            'Seld\\CliPrompt\\' => 15,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
        ),
        'M' => 
        array (
            'Myth\\Timer\\' => 11,
        ),
        'L' => 
        array (
            'League\\Glide\\' => 13,
            'League\\Flysystem\\' => 17,
            'League\\CLImate\\' => 15,
        ),
        'I' => 
        array (
            'Intervention\\Image\\' => 19,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
        ),
        'B' => 
        array (
            'Batch\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Spatie\\TemporaryDirectory\\' => 
        array (
            0 => __DIR__ . '/..' . '/spatie/temporary-directory/src',
        ),
        'Spatie\\Image\\' => 
        array (
            0 => __DIR__ . '/..' . '/spatie/image/src',
        ),
        'Spatie\\ImageOptimizer\\' => 
        array (
            0 => __DIR__ . '/..' . '/spatie/image-optimizer/src',
        ),
        'Seld\\CliPrompt\\' => 
        array (
            0 => __DIR__ . '/..' . '/seld/cli-prompt/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Myth\\Timer\\' => 
        array (
            0 => __DIR__ . '/..' . '/myth/timer/src',
        ),
        'League\\Glide\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/glide/src',
        ),
        'League\\Flysystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem/src',
        ),
        'League\\CLImate\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/climate/src',
        ),
        'Intervention\\Image\\' => 
        array (
            0 => __DIR__ . '/..' . '/intervention/image/src/Intervention/Image',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'Batch\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'PHP_Timer' => __DIR__ . '/..' . '/phpunit/php-timer/src/Timer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6e9b1f402e6b80688306cdda72434806::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6e9b1f402e6b80688306cdda72434806::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6e9b1f402e6b80688306cdda72434806::$classMap;

        }, null, ClassLoader::class);
    }
}
