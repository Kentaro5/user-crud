<?php
namespace App\Model\Validation\Form;

use Cake\Form\Form;
use Cake\Validation\Validator;

class UserEmailForm extends Form
{
    protected function _buildValidator(Validator $validator)
    {
        $validator->provider('UserEmailValidation', 'App\Model\Validation\UserEmailValidation');

        $validator
            ->add('email', 'checkUserEmail', [
                'provider' => 'UserEmailValidation',
                'rule' => 'checkUserEmail',
                'message' => 'メールアドレスは必須入力です。',
            ])
            ->add('email', 'checkUserEmailLength', [
                'provider' => 'UserEmailValidation',
                'rule' => 'checkUserEmailLength',
                'message' => 'メールアドレスは254文字以内で入力してください。',
            ])
            ->allowEmpty('email', false,'メールアドレスは必須入力です。')
            ->email('email', 254, 'メールアドレスの形式が正しくありません。');


        return $validator;
    }
}