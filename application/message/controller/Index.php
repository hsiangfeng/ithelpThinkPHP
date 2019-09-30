<?php

namespace app\message\controller;

use think\Controller;

use app\message\model\Index as indexModel;
use app\message\model\User as userModel;

use think\facade\Session;

class Index extends Controller
{
    public function index()
    {
        $content = indexModel::all()->order('create_time','desc');
        $this->assign('content',$content);
        return View('index/index')->assign('title', '留言板');
    }

    public function create()
    {
        if(Session::get('id')){
            return View('index/article')->assign('title', '新增留言');
        } 
        Session::flash('error', '請登入後在操作此動作。');
        return $this->redirect('/message/user/login');
    }

    public function save()
    {
        if(!Session::get('id')){
            Session::flash('error', '請登入後在操作此動作。');
            return $this->redirect('/message/user/login');
        } 
        $content = new indexModel();
        $contentData = input();
        $content->create_time = date('Y-m-d H:i:s');
        $content->email = Session::get('email');
        if($content->allowField(true)->save($contentData)) {
            Session::flash('messages', '留言新增成功');
            return $this->redirect('/message');
        } else {
            $content->getError();
        }
    }

    public function post($id)
    {
        $content = indexModel::where('id', '=', $id)->select();
        $this->assign('title',$content[0]['title'].'- 的留言');
        return View('index/post')->assign('content', $content[0]);
    }

    public function read($id)
    {
        if(!Session::get('id')){
            Session::flash('error', '請登入後在操作此動作。');
            return $this->redirect('/message/user/login');
        }
        $content = indexModel::where('id', '=', $id)->select();
        $sessionEmail = Session::get('email');
        $user = userModel::where('email','=', $sessionEmail)->select();
        if($user[0]['email'] == $content[0]['email']) {
            $this->assign('title','編輯留言');
            return $this->assign('content', $content[0])->fetch('article');
        } else {
            Session::flash('error', '非本人無法操作');
            return $this->redirect('/message');
        }
    }

    public function edit($id)
    {
        if(!Session::get('id')){
            Session::flash('error', '請登入後在操作此動作。');
            return $this->redirect('/message/user/login');
        }
        $content = indexModel::where('id', '=', $id)->select();
        $sessionEmail = Session::get('email');
        $user = userModel::where('email','=', $sessionEmail)->select();
        $contentData = input();
        if($user[0]['email'] == $content[0]['email']) {
            if($content[0]->update($contentData)) {
                Session::flash('messages', '留言編輯成功');
                return $this->redirect('/message');
            } else {
                $content->getError();
            }
        } else {
            Session::flash('error', '非本人無法操作');
            return $this->redirect('/message');
        }
    }

    public function delete($id)
    {
        if(!Session::get('id')){
            Session::flash('error', '請登入後在操作此動作。');
            return $this->redirect('/message/user/login');
        }
        $content = indexModel::where('id', '=', $id)->select();
        $sessionEmail = Session::get('email');
        $user = userModel::where('email','=', $sessionEmail)->select();
        if($user[0]['email'] == $content[0]['email']) {
            if($content[0]->delete()) {
                Session::flash('messages', '留言刪除成功');
                return $this->redirect('/message');
            } else {
                $content->getError();
            }
        } else {
            Session::flash('error', '非本人無法操作');
            return $this->redirect('/message');
        }
    }
}
