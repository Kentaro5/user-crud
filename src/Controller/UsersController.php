<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    //ページネーションのテンプレートを使用。
    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //使用するコンポーネントをロード。
        $this->loadComponent('User',[
            'className' => '\App\Controller\Component\User\UserComponent'
        ]);

        //コンポーネントからユーザーリストを取得。
        $users = $this->User->getUserLists();

        //ビュー側に値をセット
        $this->set('users', $users);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //使用するコンポーネントをロード。
        $this->loadComponent('User',[
            'className' => '\App\Controller\Component\User\UserComponent'
        ]);

        //Entity作成。
        $user = $this->Users->newEntity();
        $sexs = $this->User->getSexLists();

        if ($this->request->is('post')) {
            //ユーザー保存処理
            $user = $this->User->addNewUser($this->request);
        }

        //値をセット
        $this->set('user', $user);
        $this->set('sexs', $sexs);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($user_id = null)
    {

        //使用するコンポーネントをロード。
        $this->loadComponent('User',[
            'className' => '\App\Controller\Component\User\UserComponent'
        ]);

        $sexs = $this->User->getSexLists();
        $user = $this->User->getUserInfo($user_id);

        if ($this->request->is(['post', 'put'])) {
            //ユーザー情報更新処理
            $user = $this->User->editUserInfo($this->request, $user_id);
        }

        $this->set('user', $user);
        $this->set('sexs', $sexs);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($user_id = null)
    {

        //使用するコンポーネントをロード。
        $this->loadComponent('User',[
            'className' => '\App\Controller\Component\User\UserComponent'
        ]);

        $user = $this->User->getUserInfoWithSex($user_id);

        if ($this->request->is(['post', 'delete'])) {

            //ユーザー情報更新処理
            $user = $this->User->deleteUser($this->request);
        }

        $this->set('user', $user);
    }
}
