<?php

include '../vendor/autoload.php';


if (!function_exists('autoloader')) {



    /**
     * Autoloads all the php classes from the app directory
     * @param $class
     * @return void
     */
    function autoloader($class)
    {
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        $baseDir = __DIR__ . '/app';

        $filePath = recursiveFileSearch($baseDir, $classPath);




        if ($filePath !== null && file_exists($filePath)) {
            require_once $filePath;
        }
    }

    /**
     * recursively searches a given directory and returns the correct file path
     * @param $directory
     * @param $classPath
     * @return
     */
    function recursiveFileSearch($directory, $classPath)
    {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($files as $file) {
            if (strpos($file->getRealPath(), $classPath) !== false) {
                return $file->getRealPath();
            }
        }



        return null;
    }

    spl_autoload_register('autoloader');


}