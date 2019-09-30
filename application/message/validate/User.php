<?php

namespace app\message\validate;

use think\Validate;

class User extends Validate
{
	protected $rule = [
        'email' => 'require|email|token',
        'password' => 'require|min:6|max:30',
        'name' => 'require',
        'nikename' => 'require',
        'captcha'=>'require|captcha'
    ];
    protected $message = [
        'email.require' => 'Email 必填',
        'email.email'=> 'Email 格式錯誤',
        'email.token' => 'Token 出現問題請重新整理。',
        'password.require' => '密碼欄位必填',
        'password.min' => '密碼最短長度為 6',
        'password.max' => '密碼長度最長為 30',
        'name.require' => '姓名必填',
        'nikename.require' => '暱稱必填',
        'captcha.require'=>'驗證碼必填',
        'captcha.captcha'=>'驗證碼輸入錯誤',
    ];
}
