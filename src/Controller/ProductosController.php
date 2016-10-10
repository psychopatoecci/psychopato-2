<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class ProductosController extends AppController
{
    
    public function index()
    {
        
        $productos = $this->Productos->find('all');
        $this->set('productos',$productos);
    }
    public function catalogo()
    {
       /* $this->render();*/
    
         /**!----CODIGO DE PRUEBA NO BORRAR--------->***/
         
         $query = $this->Productos->find('all')->contain(['video_juegos']);
         $this -> set ('query', $query);
     /**!----CODIGO DE PRUEBA NO BORRAR--------->***/
     
     
 /*  $productos = $this->Productos->find('all');
        $this->set('productos',$productos);*/
        
    }
    public function detalles($prodId)
    {
        $producto = $this -> Productos -> get ($prodId);
        $this -> set ('nombre', $producto ['nombreProducto']);
        $this -> set ('IDProducto', $prodId);
        $this -> set ('precio', $producto ['precio']);
        $this -> set ('portada', $producto ['imagen']);
        $this -> set ('categoria', StrVal($producto ['tipo']));
        $this->render();
    }
    /* funcion temporal*/
    public function detallesprueba($codigo)
    {
        $producto = $this -> Productos -> get ($codigo);
        $this -> set ('nombre', $producto ['nombreProducto']);
        $this -> set ('IDProducto', $codigo);
        $this -> set ('precio', $producto ['precio']);
        $this -> set ('portada', $producto ['imagen']);
        $this -> set ('categoria', $producto ['tipo']);
        //$query = $this -> Productos -> find('all')->contain(['video_juegos']);
        
        /*NO BORRAR*/
        $condicion =array('video_juegos.idVideoJuego =' => $codigo);
        $query = $this -> Productos -> find('all',array(
        'fields' => array('video_juegos.descripcion'),
        'conditions'=> $condicion ))->contain(['video_juegos']);
        /*NO BORRAR*/
        //$descripcion;
        foreach ($query as $juego) {
            $this->set ('descripcion', $juego['video_juegos']['descripcion']);
        }
        //echo $descripcion;
        $this->render();
    }
    /* funcion temporal*/
    public function ofertas()
    {
        $this->render();
    }
    public function AdminProductos()
    {
        $this->render();
    }
    public function error404()
    {
        $this->render();
    }    
        public function funciones()
    {
        $this->render();
    }  
        public function upload()
    {
        $this->render();
    }  
    
    
    /* public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add']);
    }
    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['home', 'view', 'logout']))
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error('Datos son invalidos, por favor intente nuevamente', ['key' => 'auth']);
            }
        }
        if ($this->Auth->user())
        {
            return $this->redirect(['controller' => 'Users', 'action' => 'home']);
        }
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    public function home()
    {
        $this->render();
    }
    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set('users', $users);
    }
    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set('user', $user);
    }
    public function add()
    {
        $user = $this->Users->newEntity();
        if($this->request->is('post'))
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->role = 'user';
            $user->active = 1;
            if($this->Users->save($user))
            {
                $this->Flash->success('El usuario ha sido creado correctamente.');
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            else
            {
                $this->Flash->error('El usuario no pudo ser creado. Por favor, intente nuevamente.');
            }
        }
        $this->set(compact('user'));
    }
    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user))
            {
                $this->Flash->success('El usuario ha sido modificado');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El usuario no pudo ser modificado. Por favor, intente nuevamente.');
            }
        }
        $this->set(compact('user'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user))
        {
            $this->Flash->success('El usuario ha sido eliminado.');
        }
        else
        {
            $this->Flash->error('El usuario no pudo ser eliminado. Por favor, intente nuevamente.');
        }
        return $this->redirect(['action' => 'index']);
    }*/
}