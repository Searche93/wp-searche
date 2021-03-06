<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit402b99a624358bd686c9b542eb88ba7d
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WebPConvert\\' => 12,
        ),
        'S' => 
        array (
            'Searche\\' => 8,
        ),
        'I' => 
        array (
            'ImageMimeTypeGuesser\\' => 21,
        ),
        'E' => 
        array (
            'ExecWithFallback\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WebPConvert\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/webp-convert/src',
        ),
        'Searche\\' => 
        array (
            0 => __DIR__ . '/../..' . '/admin',
        ),
        'ImageMimeTypeGuesser\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src',
        ),
        'ExecWithFallback\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/exec-with-fallback/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit402b99a624358bd686c9b542eb88ba7d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit402b99a624358bd686c9b542eb88ba7d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit402b99a624358bd686c9b542eb88ba7d::$classMap;

        }, null, ClassLoader::class);
    }
}
