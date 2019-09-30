<?php

namespace app\message\controller;

use think\Controller;

use think\facade\Session;

use app\message\model\User as userModel;

class User extends Controller
{

    public function index() {
        if(Session::get('id')){
            $this->redirect('/message/index');
        }
        return View('user/login')->assign('title','登入畫面');
    }


    public function signup() {
        if(Session::get('id')){
            $this->redirect('/message/index');
        }
        return View('user/signup')->assign('title','註冊畫面');
    }

    public function save() {
        // 驗證帳號是否已存在
        $getEmail = input('email');
        $verifiUser = userModel::where('email', '=', $getEmail)->select();
        // 若陣列為 1 代表帳號已存在
        if(count($verifiUser)) {
            Session::flash('error', '帳號已存在，請重新註冊');
            $this->redirect('/message/user/signup');
        }
        // 實例化 Model
        $user = new userModel;
        // 取得所有欄位
        $userInputData = input();
        // 驗證欄位
        $result = $this->validate($userInputData, 'User');
        if(true !== $result) {
            Session::flash('error', $result);
            $this->redirect('/message/user/signup');
        }
        // 註冊成功就導向留言版首頁
        if($user->allowField(true)->save($userInputData)){
            $this->redirect('/message/index');
        } else {
            // 顯示錯誤訊息
            return $user->getError();
        }
    }

    public function login() {
        // 驗證帳號是否已存在
        $getEmail = input('email');
        $verifiUser = userModel::where('email', '=', $getEmail)->select();
        // 若陣列為 1 代表帳號已存在
        if(count($verifiUser)) {
            if($verifiUser[0]['password'] == input('password')) {
                Session::set('nikename', $verifiUser[0]['nikename']);
                Session::set('id', $verifiUser[0]['id']);
                Session::set('email', $verifiUser[0]['email']);
                $this->redirect('/message/index');
            } else {
                Session::flash('error', '帳號或密碼有誤，請重新輸入。');
                $this->redirect('/message/user/login');
            }
        } else {
            Session::flash('error', '帳號或密碼有誤，請重新輸入。');
            $this->redirect('/message/user/login');
        }
    }

    public function signout() {
        Session(null);
        $this->redirect('/message/user/login');
    }
}
