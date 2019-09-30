<?php
namespace app\about\controller;

use app\about\model\about as aboutModel;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return 'About!';
    }

    public function sayhi ($name = 'undefined')
    {
        return 'Hi：' . $name;
    }

    public function user () {
        $title = '新增資料';

        $this->assign('title',$title);
        return $this->fetch('index');
    }
    public function create ($name, $height, $weight) {
        $user = new aboutModel;
        $user->name = $name;
        $user->height = $height;
        $user->weight = $weight;
        if($user->save()){
            return '名稱：'.$user->name.',ID：'.$user->id.'。<br/>新增成功';
          }else {
            $user->getError(); // 輸出錯誤
          }
    }

    public function all() {
        $user = aboutModel::all();
        $title = '全部使用者資料';
        // foreach($user as $list) {
        //     echo $list->name.'<br/>';
        //     echo $list->height.'<br/>';
        //     echo $list->weight.'<br/>';
        // }
        $this->assign('title', $title);
        return $this->assign('user', $user)->fetch('getAllUser');
    }

    public function page() {
        $user = aboutModel::paginate(5);
        $title = '分頁範例';
        $this->assign('title', $title);
        return $this->assign('user', $user)->fetch('page');
    }

    public function select($id) {
        $user = aboutModel::get($id);
        echo $user->name.'<br/>';
        echo $user->height.'<br/>';
        echo $user->weight.'<br/>';
    }
    
    public function height() {
        $user = aboutModel::where('height', '>', 170)->select();
        echo $user;
    }

    public function heightAll() {
        $user = aboutModel::all(['name' => 'QQ先生','name' => '王小明']);
        echo $user;
    }

    public function delete($id) {
        $user = aboutModel::get($id);
        if ($user->delete()) {
        return '刪除成功'.$user->id;
        } else {
        return $user->getError();
        }
    }

    public function allJson() {
        $user = aboutModel::all();
        return $user->toJson();
    }

    public function helloeq($name){
        $this->assign('title', '判斷標籤');
        return $this->assign('name',$name)->fetch('hello');
    }
}
