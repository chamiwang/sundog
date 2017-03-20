<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/16
 * Time: 18:02
 */

class TestController extends \core\BaseController
{
    public function test()
    {
        $data['name'] = 'cccccc';
        $logic = $this->logic('test');
        $logic->create($data);
    }

    public function twig()
    {

        $this->view('test', ['aa'=>'hello']);
    }
}