<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 17:04
 */
namespace Core;

class BaseController
{
    protected function logic($name)
    {
        $name = ucfirst($name);
        $class =  "App\\Logic\\".$name."Logic";
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

    protected function response($data, $type = 'json')
    {
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode($data));
    }
}