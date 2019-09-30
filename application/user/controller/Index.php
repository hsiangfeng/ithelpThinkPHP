<?php
namespace app\user\controller;

use app\user\model\user as userModel;

use think\facade\Session;

use think\Controller;

class Index extends Controller
{
    protected $batchValidate = true;
    
    public function getSignin()
    {
        $this->assign("title", "登入頁面");
        return $this->fetch('signin');
    }

    public function getSignup()
    {
        return View('signup')->assign("title", "註冊頁面");
    }

    public function add() {
        $user = new userModel;
        $userData = input();
        $result = $this->validate($userData, 'User');
        if(true !== $result) {
            Session::flash('error', $result);
            $this->redirect('/user/signup');
        }
        if($user->allowField(true)->save($userData)){
            return '新增成功';
        } else {
            return $user->getError();
        }
    }
}
