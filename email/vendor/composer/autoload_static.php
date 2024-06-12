<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd8b4166015557c4e858a16bcbe510265
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd8b4166015557c4e858a16bcbe510265::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd8b4166015557c4e858a16bcbe510265::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd8b4166015557c4e858a16bcbe510265::$classMap;

        }, null, ClassLoader::class);
    }
}
