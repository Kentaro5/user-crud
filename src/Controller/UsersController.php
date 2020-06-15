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
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
