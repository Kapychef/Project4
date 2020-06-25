<?php

namespace App\Tools;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($classpath)
        {
          $required = str_replace('\\', '/', $classpath);
          require_once($required.'.php');
        });

    }
}