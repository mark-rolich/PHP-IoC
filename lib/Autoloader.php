<?php
/**
* Classes autoloader
*
*/
class Autoloader
{
    /**
    * Register callback
    *
    * @return mixed
    */
    public static function register()
    {
        return spl_autoload_register(array('Autoloader', 'load'));
    }

    /**
    * Class loader
    *
    * @param $className string - class name
    */
    public static function load($className)
    {
        $ext = '.php';

        if (file_exists(LIBDIR . $className . $ext)) {
            require LIBDIR . $className . $ext;
        }
    }
}
?>