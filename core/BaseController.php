<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 17:04
 */
namespace Core;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController
{
    protected $request = '';

    public function __construct()
    {
        $request = Request::createFromGlobals();
        $this->request = $request->request;
    }

    protected function logic($name)
    {
        $name = ucfirst($name);
        $class =  'App\\Logic\\'.$name."Logic";
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

    protected function render($view, array $data)
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
            return $twig['twig']->render('@'.$namespace.'/'.$html.'.html', $data);
        } else {
            return $twig['twig']->render($view.'.html', $data);
        }
    }

    protected function JsonResponse($data)
    {
        $response = new JsonResponse($data);
        if(!$data) {
            $response->setStatusCode(Response::HTTP_EXPECTATION_FAILED);
        }
        $response->send();
    }
}