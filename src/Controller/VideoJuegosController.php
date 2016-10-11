<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VideoJuegos Controller
 *
 * @property \App\Model\Table\VideoJuegosTable $VideoJuegos
 */
class VideoJuegosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['productos']
        ];
        $videoJuegos = $this->paginate($this->VideoJuegos);

        $this->set(compact('videoJuegos'));
        $this->set('_serialize', ['videoJuegos']);
    }

    /**
     * View method
     *
     * @param string|null $id Video Juego id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $videoJuego = $this->VideoJuegos->get($id, [
            'contain' => ['productos', 'generos']
        ]);

        $this->set('videoJuego', $videoJuego);
        $this->set('_serialize', ['videoJuego']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $videoJuego = $this->VideoJuegos->newEntity();
        if ($this->request->is('post')) {
            $videoJuego = $this->VideoJuegos->patchEntity($videoJuego, $this->request->data);
            if ($this->VideoJuegos->save($videoJuego)) {
                $this->Flash->success(__('The video juego has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The video juego could not be saved. Please, try again.'));
            }
        }
        $productos = $this->VideoJuegos->productos->find('list', ['limit' => 200]);
        $this->set(compact('videoJuego', 'productos'));
        $this->set('_serialize', ['videoJuego']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Video Juego id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $videoJuego = $this->VideoJuegos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $videoJuego = $this->VideoJuegos->patchEntity($videoJuego, $this->request->data);
            if ($this->VideoJuegos->save($videoJuego)) {
                $this->Flash->success(__('The video juego has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The video juego could not be saved. Please, try again.'));
            }
        }
        $productos = $this->VideoJuegos->productos->find('list', ['limit' => 200]);
        $this->set(compact('videoJuego', 'productos'));
        $this->set('_serialize', ['videoJuego']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Video Juego id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $videoJuego = $this->VideoJuegos->get($id);
        if ($this->VideoJuegos->delete($videoJuego)) {
            $this->Flash->success(__('The video juego has been deleted.'));
        } else {
            $this->Flash->error(__('The video juego could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
