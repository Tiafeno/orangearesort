<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf1cfb0dd5b62a72bb6c12e5acd41bfce
{
    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Detection' => 
            array (
                0 => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/namespaced',
            ),
        ),
    );

    public static $classMap = array (
        'Mobile_Detect' => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/Mobile_Detect.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitf1cfb0dd5b62a72bb6c12e5acd41bfce::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitf1cfb0dd5b62a72bb6c12e5acd41bfce::$classMap;

        }, null, ClassLoader::class);
    }
}