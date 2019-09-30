<?php
namespace app\about\controller;

use think\Controller;

class HelloWorld extends Controller
{
    public function Hello()
    {
        $name = 'IT邦幫忙';
        return $this->assign('name',$name) -> fetch();
    }
}