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




}

