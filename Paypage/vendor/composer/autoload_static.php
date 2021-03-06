<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit29c2ba8ad0d937e0453b1d60302f6e00
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit29c2ba8ad0d937e0453b1d60302f6e00::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit29c2ba8ad0d937e0453b1d60302f6e00::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
