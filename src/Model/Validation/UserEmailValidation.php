<?php
namespace App\Model\Validation;

use Cake\Validation\Validation;

class UserEmailValidation extends Validation
{

    public static function checkUserEmail($user_email)
    {
        //空白削除
        $user_email  = preg_replace("/( |　)/", "", $user_email );

        //ユーザーのメールアドレスが空じゃないかどうかをチェックする。
        if( mb_strlen( $user_email, "UTF-8" ) <= 0 ){
            return false;
        }

        return true;
    }

    public static function checkUserEmailLength($user_email)
    {
        //空白削除
        $user_email  = preg_replace("/( |　)/", "", $user_email );

        //メールアドレスは254文字以内
        if( mb_strlen( $user_email, "UTF-8" ) > 254 ){
            return false;
        }

        return true;
    }

}
