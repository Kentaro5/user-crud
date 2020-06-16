<?php
namespace App\Model\Validation;

use Cake\Validation\Validation;

class UserNameValidation extends Validation
{

    public static function checkUserName($user_name)
    {
        //空白削除
        $user_name  = preg_replace("/( |　)/", "", $user_name );

        //ユーザーの姓名が空じゃないかどうかをチェックする。
        if( mb_strlen( $user_name, "UTF-8" ) <= 0 ){
            return false;
        }

        return true;
    }


    public static function checkUserNameLength($user_name)
    {
        //空白削除
        $user_name  = preg_replace("/( |　)/", "", $user_name );

        //ユーザーの姓名はそれぞれ30文字以内
        if( mb_strlen( $user_name, "UTF-8" ) > 30 ){
            return false;
        }

        return true;
    }

}
