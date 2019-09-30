<?php

namespace app\User\validate;

use think\Validate;

class User extends Validate
{
	protected $rule = [
        'email' => 'require|email|token',
        'password' => 'require|min:8|max:30',
        'gender' => 'require|number',
        'captcha'=>'require|captcha'
    ];
    protected $message = [
        'email.require' => 'Email 必填',
        'email.email'=> 'Email 格式錯誤',
        'email.token' => 'Token 出現問題請重新整理。',
        'password.require' => '密碼欄位必填',
        'password.min' => '密碼最短長度為 8',
        'password.max' => '密碼長度最長為 30',
        'gender.require' => '性別必填',
        'gender' => '性別必須為是數字',
        'captcha.require'=>'驗證碼必填',
        'captcha.captcha'=>'驗證碼輸入錯誤',
    ];
}
