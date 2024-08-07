<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a87806424dcadd9cd267219d18bcf61
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Ufozone\\PhpSepa\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ufozone\\PhpSepa\\' => 
        array (
            0 => __DIR__ . '/..' . '/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4a87806424dcadd9cd267219d18bcf61::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4a87806424dcadd9cd267219d18bcf61::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4a87806424dcadd9cd267219d18bcf61::$classMap;

        }, null, ClassLoader::class);
    }
}
