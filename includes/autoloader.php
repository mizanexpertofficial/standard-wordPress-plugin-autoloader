<?php

/**
 * Author:      MizanExpert
 * Author URI:  https://mizanexpert.com/
 */


/**
 * Default namespace MizanExpert
 * 
 * Change the default namespace MizanExpert to namespace YourNamespace
 */

namespace MizanExpert;

final class Autoloader
{
    private static $instance;

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private $prefixes = [];

    public function add_namespace($prefix, $baseDir, $prepend = false)
    {
        $prefix = trim($prefix, '\\') . '\\';

        $baseDir = rtrim($baseDir, DIRECTORY_SEPARATOR) . '/';

        if (!isset($this->prefixes[$prefix])) {
            $this->prefixes[$prefix] = [];
        }

        if ($prepend === false) {
            array_push($this->prefixes[$prefix], $baseDir);
        } else {
            array_unshift($this->prefixes[$prefix], $baseDir);
        }
    }

    public function class_loader($class)
    {
        $prefix = $class;

        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);

            $relativeClass = substr($class, $pos + 1);

            $fileLoaded = $this->file_loader($prefix, $relativeClass);

            if ($fileLoaded) {
                return true;
            }

            $prefix = rtrim($prefix, '\\');
        }

        return false;
    }

    public function file_loader($prefix, $relativeClass)
    {
        if (isset($this->prefixes[$prefix]) === false) {
            return false;
        }

        $relativeClass = str_replace('\\', '/', $relativeClass);

        foreach ($this->prefixes[$prefix] as $baseDir) {
            $file = $baseDir . $relativeClass . '.php';

            if ($this->include_file($file)) {
                return true;
            }
        }

        return false;
    }

    public function register()
    {
        spl_autoload_register([$this, 'class_loader']);
    }

    public function include_file($file)
    {
        if (file_exists($file)) {
            require $file;

            return true;
        }

        return false;
    }
}
