<?php

namespace App\Controller\Component\User;

use Cake\Controller\Component;

use App\Model\Validation\Form\UserNameForm;
use App\Model\Validation\Form\UserTellForm;
use App\Model\Validation\Form\UserEmailForm;

use Cake\Datasource\ModelAwareTrait;
use Cake\Datasource\ConnectionManager;

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

    public function getUserInfo( $user_id ) {

        //使用するモデルをロード。
        $this->loadModel('Users');

        return $this->Users->get($user_id);
    }

    public function getUserLists() {

        //使用するモデルをロード。
        $this->loadModel('Users');

        //Sexsテーブルを参照しながら、データを取得するクエリーを発行。
        $users = $this->Users->find()
            ->contain(['Sexs'])
            ->order(['Users.id' => 'ASC']);

        return $this->Paginator->paginate($users, ['limit' => 10]);
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

        //Entityに通すとsexが消えるので、改めて追加。
        $user->sex = $request->getData()['sex'];

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

        //トランザクション処理のセット。
        $db_transaction = ConnectionManager::get('default');

        try{
            $db_transaction->begin();
            if ($this->Users->saveOrFail($user)) {

                $this->Flash->success(__('ユーザーを新しく作成しました。'));

                //DBの保存処理をDBに反映する。
                $db_transaction->commit();

                //保存後はトップページに遷移。
                return $this->_registry->getController()->redirect(['action' => 'index']);
            }

        } catch(\Cake\ORM\Exception\PersistenceFailedException $e) {
            //logにエラーの詳細を記載。
            $this->log($e->getCode(), 'debug');
            $this->log($e->getMessage(), 'debug');
            $this->log($e->getFile(), 'debug');
            $this->log($e->getTraceAsString(), 'debug');
            $this->log($e->getEntity(), 'debug');

            $this->Flash->error(__('ユーザーの作成に失敗しました。お手数ですが、もう一度処理をやり直してください。'));

            //DBの保存処理を巻き戻して元の状態に戻す。
            $db_transaction->rollback();
        }
    }

    public function editUserInfo( $request ) {

    }


}

