<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Wishlist Controller
 *
 * @property \App\Model\Table\WishlistTable $Wishlist
 */
class WishlistController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $wishlist = $this->paginate($this->Wishlist);

        $this->set(compact('wishlist'));
        $this->set('_serialize', ['wishlist']);
    }

    /**
     * View method
     *
     * @param string|null $id Wishlist id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wishlist = $this->Wishlist->get($id, [
            'contain' => []
        ]);

        $this->set('wishlist', $wishlist);
        $this->set('_serialize', ['wishlist']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wishlist = $this->Wishlist->newEntity();
        if ($this->request->is('post')) {
            $wishlist = $this->Wishlist->patchEntity($wishlist, $this->request->data);
            if ($this->Wishlist->save($wishlist)) {
                $this->Flash->success(__('The wishlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The wishlist could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('wishlist'));
        $this->set('_serialize', ['wishlist']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Wishlist id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wishlist = $this->Wishlist->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wishlist = $this->Wishlist->patchEntity($wishlist, $this->request->data);
            if ($this->Wishlist->save($wishlist)) {
                $this->Flash->success(__('The wishlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The wishlist could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('wishlist'));
        $this->set('_serialize', ['wishlist']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Wishlist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wishlist = $this->Wishlist->get($id);
        if ($this->Wishlist->delete($wishlist)) {
            $this->Flash->success(__('The wishlist has been deleted.'));
        } else {
            $this->Flash->error(__('The wishlist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
