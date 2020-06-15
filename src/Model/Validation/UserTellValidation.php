<?php
namespace App\Model\Validation;

use Cake\Validation\Validation;

class UserTellValidation extends Validation
{

    public static function checkUserTell($user_tell)
    {
        //空白削除
        $user_tell  = preg_replace("/( |　)/", "", $user_tell );

        //電話番号が空じゃないかどうかをチェックする。
        if( mb_strlen( $user_tell, "UTF-8" ) <= 0 ){
            return false;
        }

        return true;
    }

    public static function checkUserTellFormat($user_tell)
    {
        //空白削除
        $user_tell  = preg_replace("/( |　)/", "", $user_tell );

        //電話番号の形式が正しいかどうかチェックする。
        if( ! preg_match('/^[0-9]{2,4}-?[0-9]{2,4}-?[0-9]{2,4}$/', $user_tell) ){
            return false;
        }

        return true;
    }


    public static function checkUserTellLength($user_tell)
    {
        //空白削除
        $user_tell  = preg_replace("/( |　)/", "", $user_tell );

        //電話番号は18文字以内かチェック
        if( mb_strlen( $user_tell, "UTF-8" ) > 15 ){
            return false;
        }

        return true;
    }

}
