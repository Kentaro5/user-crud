<?php

namespace App\Controller\Component\User;

use Cake\Controller\Component;

use App\Model\Validation\Form\UserNameForm;
use App\Model\Validation\Form\UserTellForm;
use App\Model\Validation\Form\UserEmailForm;

use Cake\Datasource\ModelAwareTrait;

class UserComponent extends Component {

    use ModelAwareTrait;
    public $components = array('Paginator', 'Flash');
    protected $user_name_form;
    protected $user_tell_form;
    protected $user_email_form;

    public function initialize(array $config)
    {
        $this->user_name_form = new UserNameForm();
        $this->user_tell_form = new UserTellForm();
        $this->user_email_form = new UserEmailForm();
    }

    public function getSexLists() {
        $this->loadModel('Sexs');
        return $this->Sexs->find();
    }


    public function addNewUser( $request ) {
        //使用するモデルをロード。
        $this->loadModel('Users');

        //バリデーションチェック。
        $this->user_name_form->validate($request->getData());
        $this->user_tell_form->validate($request->getData());
        $this->user_email_form->validate($request->getData());

        //Entity作成。
        $user = $this->Users->newEntity($request->getData());
        $user = $this->Users->patchEntity($user, $request->getData());

        //エラーがあれば、errorsに格納。
        if(!empty($this->user_name_form->errors()['first_name'])) {
            $user->errors('first_name', $this->user_name_form->errors()['first_name']);
        }

        if(!empty($this->user_name_form->errors()['last_name'])) {
            $user->errors('last_name', $this->user_name_form->errors()['last_name']);
        }

        if(!empty($this->user_tell_form->errors()['tell'])) {
            $user->errors('tell', $this->user_tell_form->errors()['tell']);
        }

        if(!empty($this->user_email_form->errors()['email'])) {
            $user->errors('email', $this->user_email_form->errors()['email']);
        }

        //エラーがあれば、エラーを返す。
        if( $user->errors() )
        {
            return $user;
        }
    }


}

