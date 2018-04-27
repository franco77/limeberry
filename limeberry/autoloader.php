<?php
/**
 * Limeberry Framework
 *   
 * A php framework for fast web development.
 *   
 * @package Limeberry Framework
 * @author Sinan SALIH
 * @copyright Copyright (C) 2018 Sinan SALIH
 */

require_once 'base.php';

/** 
 * PSR-4 Auto-loading.
 * @link <https://www.php-fig.org/psr/psr-4/>.
 */
spl_autoload_register(function ($class)
{
    $prefixes = array(
        "limeberry\\dataman\\",
        "limeberry\\forms\\",
        "limeberry\\helpers\\",
        "limeberry\\io\\",
        "limeberry\\security\\",
        "limeberry\\tool\\",
        "limeberry\\visual\\"
    );
    $baseDir = ROOT . DS;
    $baseDir = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $baseDir);
    foreach ($prefixes as $prefix)
    {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0)
        {
            continue;
        }
        $relativeClass = substr($class, $len);
        $file = $baseDir . DIRECTORY_SEPARATOR . str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $relativeClass) . '.php';
        if (file_exists($file))
        {
            require $file;
        }
    }
    $file = $baseDir . str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
?>
