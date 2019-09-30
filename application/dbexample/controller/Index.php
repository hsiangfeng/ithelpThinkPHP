<?php
namespace app\dbexample\controller;

use think\Controller;

use think\Db;

class Index extends Controller
{
    public function index()
    {
        return 'About!';
    }
    public function add() 
    {
      $result = Db::execute('INSERT INTO think_db (name) VALUE ("王大明")');
      dump($result);
    }
    public function update()
    {
      $result = Db::execute('UPDATE think_db SET name="QQ 先生" WHERE name="王大明"');
      dump($result);
    }
    public function select()
    {
      $result = Db::query('SELECT * FROM think_db WHERE name="QQ 先生"');
      dump($result);
    }
    public function delete()
    {
      $result = Db::execute('DELETE FROM think_db WHERE name="QQ 先生"');
      dump($result);
    }

    public function sqlAdd()
    {
      $db = db('db');
      $db->insert(['name'=>'陳春嬌']);
    }
    public function sqlUpdate()
    {
      $db = db('db');
      $db->where('name','陳春嬌')->update(['name'=>'陳秋嬌']);
    }
    public function sqlSelect()
    {
      $db = db('db');
      $db->where('name','陳秋嬌')->select();
    }
    public function sqlDelete()
    {
      $db = db('db');
      $db->where('name','陳秋嬌')->delete();
    }
}
