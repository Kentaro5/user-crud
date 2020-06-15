<?php
namespace App\Model\Validation\Form;

use Cake\Form\Form;
use Cake\Validation\Validator;

class UserTellForm extends Form
{
    protected function _buildValidator(Validator $validator)
    {
        $validator->provider('UserTellValidation', 'App\Model\Validation\UserTellValidation');

        $validator
            ->add('tell', 'checkUserTell', [
                'provider' => 'UserTellValidation',
                'rule' => 'checkUserTell',
                'message' => '電話番号は必須入力です。',
            ])
            ->add('tell', 'checkUserTellFormat', [
                'provider' => 'UserTellValidation',
                'rule' => 'checkUserTellFormat',
                'message' => '電話番号の形式が正しくありません。',
            ])
            ->add('tell', 'checkUserTellLength', [
                'provider' => 'UserTellValidation',
                'rule' => 'checkUserTellLength',
                'message' => '電話番号は18文字以内で入力してください。',
            ])
            ->allowEmpty('tell', false,'電話番号は必須入力です。');


        return $validator;
    }
}
