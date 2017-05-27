<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 11:31
 */

namespace Core;

class Twig
{
    private static $instance;
    public static function getInstance()
    {
        // the connection configuration
        $config = include(APP_ROOT.'/app/config/config.php');

        if(! (self::$instance instanceof self) ) {
            $loader = new\Twig_Loader_Filesystem([APP_ROOT.'/app/views']);
            self::$instance['loader'] = $loader;
            self::$instance['twig'] = new \Twig_Environment($loader, $config['twig']);
            $escaper = new \Twig_Extension_Escaper('html');
            self::$instance['twig']->addExtension($escaper);
        }
        return self::$instance;
    }
}