<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 17:04
 */
namespace core;

class BaseController
{
    protected function logic($name)
    {
        $name = ucfirst($name);
        $class =  "\\logics\\".$name."Logic";
        return new $class();
    }

    protected function view($view, array $data)
    {
        $twig = Twig::getInstance();
        if(strpos($view, '.')) {
            $arr = explode('.', $view);
            $path =  '';
            $namespace = '';
            $html = '';
            for($i=0;$i<=(count($arr) -2);$i++) {
                $path .= '/'.$arr[$i];
                $namespace .= $arr[$i];
                if($i == (count($arr) -2)) {
                    $html = $arr[$i+1];
                }
            }
            $twig['loader']->addPath(APP_ROOT.'/app/views'.$path, $namespace);
            $twig['twig']->display('@'.$namespace.'/'.$html.'.html', $data);
        } else {
            $twig['twig']->display($view.'.html', $data);
        }
    }
}