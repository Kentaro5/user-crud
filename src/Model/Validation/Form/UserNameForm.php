<?php
namespace App\Model\Validation\Form;

use Cake\Form\Form;
use Cake\Validation\Validator;

class UserNameForm extends Form
{
    protected function _buildValidator(Validator $validator)
    {
        $validator->provider('UserNameValidation', 'App\Model\Validation\UserNameValidation');

        $validator
            ->add('first_name', 'checkUserName', [
                'provider' => 'UserNameValidation',
                'rule' => 'checkUserName',
                'message' => '姓は必須入力です。',
            ])
            ->add('first_name', 'checkUserNameLength', [
                'provider' => 'UserNameValidation',
                'rule' => 'checkUserNameLength',
                'message' => '姓は30文字以内で入力してください。',
            ])
            ->add('last_name', 'checkUserName', [
                'provider' => 'UserNameValidation',
                'rule' => 'checkUserName',
                'message' => '名は必須入力です。',
            ])
            ->add('last_name', 'checkUserNameLength', [
                'provider' => 'UserNameValidation',
                'rule' => 'checkUserNameLength',
                'message' => '名は30文字以内で入力してください。',
            ])
            ->allowEmpty('first_name', false,'姓は必須入力です。')
            ->allowEmpty('last_name', false,'名は必須入力です。');


        return $validator;
    }
}
