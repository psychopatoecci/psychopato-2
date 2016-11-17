<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
/**
 * Personas Controller
 *
 * @property \App\Model\Table\PersonasTable $Personas
 */
class PersonasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     **/
     
     public function nuevousuario(){
         $this->render();
         
     }
     
    //Controlador de una factura
    public function factura() {
        $this->render();
    }
     
     
      public function borrar($id){
        
        $entity = $this->Personas->get($id);
        $result = $this->Personas->delete($entity);
         
         
         //$this->render();
         
     }
     

     
     
    /** Funcion para agregar un usuario
     * funcion guardar
     * se extrae la informacion de los contenedores en la vista guardar   
     * se insertan datos en la tabla de personas
     * se inserta en la tabla de direcciones
     * se inserta en la tabla de teñefonos
     */
     
    public function guardar()
    {
        
        
     /* se accede a las tablas respectivas */
    
        $direcciones = TableRegistry::get('Direcciones');
        $telefonos = TableRegistry::get('TelefonosPersonas');
        
        $personas= TableRegistry::get('Personas');
        $query = $personas->query();
        $Id= $this->request->data('id');
        $Nombre=$this->request->data('nombre');
        $Apellido=$this->request->data('apellido1');
        $Apellido2=$this->request->data('apellido2');
        $Fecha_nac=$this->request->data('fecha');
        
        $query2 = $direcciones->query();
        $query3 = $telefonos->query();
        
        $query4 = $direcciones->query();
        $query5 = $direcciones->query();
        $query6 = $telefonos->query();
        $query7 = $telefonos->query();
        
        
     /* carga las variables en los campos respectivos para la insercion */           
        $prov2=$this->request->data('Provincia2');
        $can2=$this->request->data('canton2');
        $dist2=$this->request->data('distrito2');
        $dir2=$this->request->data('exacta2');
        
        
        $telcasa=$this->request->data('telcasa');
        $teltrabajo=$this->request->data('teltrabajo');
        $telcel=$this->request->data('telcelular');
        $other=$this->request->data('telotro');
        
        $prov3=$this->request->data('Provincia3');
        $can3=$this->request->data('canton3');
        $dist3=$this->request->data('distrito3');
        $dir3=$this->request->data('exacta3');
        
        $prov1=$this->request->data('Provincia1');
        $can1=$this->request->data('canton1');
        $dist1=$this->request->data('distrito1');
        $dir1=$this->request->data('exacta1');
        
        
        /* inserta persona */
        $query->insert(['identificacion', 'nombre','apellido1', 'apellido2','fecha_nacimiento', 'tipo'])
        ->values([
        'identificacion' => $Id,
        'nombre' => $Nombre,
        'apellido1'=>$Apellido,
        'apellido2'=>$Apellido2,
        'fecha_nacimiento'=>$Fecha_nac,
        'tipo'=>'cliente'
        ])
    ->execute();
    
    /* inserta direccion de una persona */
    $query2->insert(['identificacion', 'tipo_dir','cod_provincia','cod_canton', 'cod_distrito', 'detalles'])
        ->values([
        'identificacion' =>$Id ,
        'tipo_dir' => 'Casa',
        'cod_provincia'=>'1',
        'cod_canton'=>$can1,
        'cod_distrito'=>$dist1,
        'detalles'=>$dir1
        ])
    ->execute();
    
    
    $query3->insert(['identificacion', 'tipo_tel','telefono'])
        ->values([
        'identificacion' => $Id,
        'tipo_tel' => 'Casa',
        'telefono'=> $telcasa
        ])
    ->execute();
    
    
    
    /* inserta telefonos de un cliente */
    if(!empty($teltrabajo))
    {
         $query6->insert(['identificacion', 'tipo_tel','telefono'])
        ->values([
        'identificacion' => $Id,
        'tipo_tel' => 'Trabajo',
        'telefono'=> $teltrabajo
        ])
    ->execute();
        
    }
    
     if(!empty($telcel))
    {
         $query7->insert(['identificacion', 'tipo_tel','telefono'])
        ->values([
        'identificacion' => $Id,
        'tipo_tel' => 'Celular',
        'telefono'=> $telcel
        ])
    ->execute();
        
    }
    
    if(!empty($dir2))
        {
      $query4->insert(['identificacion', 'tipo_dir','cod_provincia','cod_canton', 'cod_distrito', 'detalles'])
        ->values([
        'identificacion' =>$Id ,
        'tipo_dir' => 'Otro',
        'cod_provincia'=>'1',
        'cod_canton'=>$can2,
        'cod_distrito'=>$dist2,
        'detalles'=>$dir2
        ])
    ->execute();
        }
    
     if(!empty($dir3))
        {
      $query5->insert(['identificacion', 'tipo_dir','cod_provincia','cod_canton', 'cod_distrito', 'detalles'])
        ->values([
        'identificacion' =>$Id ,
        'tipo_dir' => 'Trabajo',
        'cod_provincia'=>'1',
        'cod_canton'=>$can3,
        'cod_distrito'=>$dist3,
        'detalles'=>$dir3
        ])
    ->execute();
        }
    
    /* Revisa sihay informacion suficiente antes de insertar en la base de datos */
    if($query&&$query2&&$query3)
    {
        $this->Flash->success('Usuario exitosamente creado');
        $this->redirect(['controller'=>'Personas', 'action'=>'nuevousuario']);
        
    }else{
        $this->Flash->error('No sirvio');
        
    }
    
        
     /*   $query->insert(['identificacion', 'nombre','apellido1', 'apellido2','fecha_nacimiento', 'tipo'])
        ->values([
        'identificacion' => $Id,
        'nombre' => $Nombre,
        'apellido1'=>$Apellido,
        'apellido2'=>$Apellido2,
        'fecha_nacimiento'=>$Fecha_nac,
        'tipo'=>'cliente'
        ])
    ->execute();
    */
    
    /*$query2->insert(['identificacion', 'tipo','cod_provincia','cod_canton', 'cod_distrito', 'detalles'])
        ->values([
        'identificacion' =>$Id ,
        'tipo' => 'Casa',
        'cod_provincia'=>'1',
        'cod_canton'=>'1',
        'cod_distrito'=>'1',
        'detalles'=>$Direccion
        ])
    ->execute();
    
    
    $query3->insert(['identificacion', 'tipo_tel','telefono'])
        ->values([
        'identificacion' => $Id,
        'tipo_tel' => 'Casa',
        'telefono'=> $Telefono
        ])
    ->execute();
*/
    }
    
    public function adminUsuarios()
    {
        if ($this->request->is('post')) {
            //$this -> set ('request', $this->request->data);
            $datos = $this -> request -> data;
			if ($datos ['tipoReq'] == 'generales') {
                // Se actualizan los datos generales del usuario.
				$actualizando = $this -> Personas -> get ($datos ['id']);
				$actualizando [ 'nombre'  ] = $datos ['nombre'];
				$actualizando ['apellido1'] = $datos ['apellido1'];
				$actualizando ['apellido2'] = $datos ['apellido2'];
				$this -> Personas -> save ($actualizando);
				$telefonos = TableRegistry::get('telefonos_personas');
                if (isset ($datos['borrarTrabajo'])) {
                    $porBorrar = $telefonos -> get (
                        ['identificacion' => $datos ['id'],
                        'tipo_tel' => 'Trabajo']
                    );
                    $telefonos -> delete ($porBorrar);
                }
				else if (isset ($datos['telTrabajo']) && $datos ['telTrabajo'] > 0) {
					$telTrabajo = $telefonos -> newEntity();
					$telTrabajo ['identificacion'] = $datos ['id'];
					$telTrabajo ['tipo_tel']       = 'Trabajo';
					$telTrabajo ['telefono']       = $datos['telTrabajo'];
					$telefonos -> save ($telTrabajo);
				}
                if (isset ($datos['borrarCasa'])) {
                    $porBorrar = $telefonos -> get (
                        ['identificacion' => $datos ['id'],
                        'tipo_tel' => 'Casa']
                    );
                    $telefonos -> delete ($porBorrar);
                } else
				if (isset ($datos['telCasa']) && $datos ['telCasa'] > 0) {
					$telCasa = $telefonos -> newEntity();
					$telCasa ['identificacion'] = $datos ['id'];
					$telCasa ['tipo_tel']       = 'Casa';
					$telCasa ['telefono']       = $datos['telCasa'];
					$telefonos -> save ($telCasa);
				}
                if (isset ($datos['borrarOtro'])) {
                    $porBorrar = $telefonos -> get (
                        ['identificacion' => $datos ['id'],
                        'tipo_tel' => 'Otro']
                    );
                    $telefonos -> delete ($porBorrar);
                } else
				if (isset ($datos['telOtro']) && $datos ['telOtro'] > 0) {
					$telOtro = $telefonos -> newEntity();
					$telOtro ['identificacion'] = $datos ['id'];
					$telOtro ['tipo_tel']       = 'Otro';
					$telOtro ['telefono']       = $datos['telOtro'];
					$telefonos -> save ($telOtro);
				}
                if (isset ($datos['borrarCelular'])) {
                    $porBorrar = $telefonos -> get (
                        ['identificacion' => $datos ['id'],
                        'tipo_tel' => 'Celular']
                    );
                    $telefonos -> delete ($porBorrar);
                } else
				if (isset ($datos['telCelular']) && $datos ['telCelular'] > 0) {
					$telCelular = $telefonos -> newEntity();
					$telCelular ['identificacion'] = $datos ['id'];
					$telCelular ['tipo_tel']       = 'Celular';
					$telCelular ['telefono']       = $datos['telCelular'];
					$telefonos -> save ($telCelular);
				}
			} else if ($datos ['tipoReq'] == 'direcciones') {
                // Se actualizan las direcciones.
                $dirs = TableRegistry::get ('personas_direcciones');
                // Como las direcciones utilizan un id, para asegurarse de que
                // quedan las mismas que en la vista, hay que borrarlas e
                // insertarlas de nuevo.
                // Pero antes se revisa si las direcciones ingresadas son
                // correctas para no borrar y luego no poder insertar.
                for ($i=0; $i< $datos ['cantidad']; $i++) {
                    $direc = TableRegistry::get('distritos')-> find ('all')
                    -> where (
                        "nombreProvincia = '".$datos ['provincia'.$i]."' and ".
                        "nombreDistrito = '".$datos ['distrito'.$i]."' and ".
                        "nombreCanton = '".$datos ['canton'.$i]."'"
                    );
                    $existe = false;
                    foreach ($direc as $dir) {
                        $existe = true;
                    }
                    if (!$existe) { // Hay alguna dirección incorrecta.
                        // No se continúa con el borrado e inserción.
                        $this -> Flash -> error ('Una dirección no existe.'
                        .'No se actualizaron los datos.');
                        return $this-> redirect ('personas/admin_usuarios');
                    }
                } // Fin del for de eliminar las direcciones.
                $porBorrar = $dirs->find('all')
                    ->where ("idPersona = '".$datos ['id']."'");
                foreach ($porBorrar as $dirVieja) {
                    $dirs->delete($dirVieja);
                }
                $cantidad = $datos ['cantidad'];
                if (isset($datos['agregar'])) {
                    // Se va a agregar una nueva dirección.
                    $cantidad ++;
                }
				for ($i=0; $i < $cantidad; $i++) {
                    if (isset($datos['borrar'.$i])) {
                        // Ya se borró la dirección, simplemente no se inserta.
                    } else {
                        // Se actualizan datos.
                        $nuevaDir = $dirs -> newEntity();
                        $nuevaDir ['idPersona'] = $datos ['id'];
                        $nuevaDir ['nombreProvincia'] = $datos ['provincia'.$i];
                        $nuevaDir ['nombreCanton']    = $datos ['canton'.$i];
                        $nuevaDir ['nombreDistrito']  = $datos ['distrito'.$i];
                        $nuevaDir ['detalles']        = $datos ['detalles'.$i];
                        try {
                        if (!$dirs -> save ($nuevaDir)) {
                            $this -> Flash -> 
                                error ('Error insertando/actualizando dirección');
                            return $this-> redirect ('personas/admin_usuarios');
                        }} catch (Exception $e) {
                            $this -> Flash -> 
                            error ('Error insertando/actualizando dirección');
                            return $this-> redirect ('personas/admin_usuarios');
                        }
                    }
				}
            } else if ($datos ['tipoReq'] == 'tarjetas'){
                $tarjetas = $this -> Personas -> get ($datos['id'], 
                    ['contain' => 'tarjetas']);
                for ($i=0; $i<$datos['cantidad']; $i++){
                    if(isset($datos['borrar'.$i])) {
                        TableRegistry::get('tarjetas')
                            ->delete($tarjetas['tarjetas'][$i]);
                    }
                }
			} else if ($datos ['tipoReq'] == 'borrar' ){
                $porBorrar = $this -> Personas -> get ($datos ['id']);
                $this -> Personas -> delete ($porBorrar);
            }
        } // Fin de si el request es post.

        // Se buscan las personas y se paginan por $numPage.
        $numPage = 1;
        $nuevaPag = $this -> request -> query('nuevaPag');
        if ($nuevaPag && $nuevaPag > 0) {
            $numPage = $nuevaPag;
        }
        $personas = $this -> Personas -> find ('all', 
            ['contain' => ['personas_direcciones',
            'telefonos_personas', 'tarjetas']]);
        $busqueda = $this -> request -> query('busqueda');
        if ($busqueda) {
            $personas = $personas -> where ("identificacion LIKE '%".$busqueda."%'
                OR nombre LIKE '%".$busqueda."%'");
            // Le dice a la vista que está mostrando solo los buscados para que
            // los botones de anterior y siguiente funcionen correctamente.
            $this -> set ('buscando', $busqueda); 
        }
        $personas = $personas -> limit(16) -> page ($numPage);
        $this -> set ('numPage', $numPage);
        $this -> set ('usuarios', $personas);
        $this -> render();
    }
    
    public function index()
    {
        $personas = $this->paginate($this->Personas);

        $this->set(compact('personas'));
        $this->set('_serialize', ['personas']);
    }

    /**
     * View method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $persona = $this->Personas->get($id, [
            'contain' => []
        ]);

        $this->set('persona', $persona);
        $this->set('_serialize', ['persona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $persona = $this->Personas->newEntity();
        if ($this->request->is('post')) {
            $persona = $this->Personas->patchEntity($persona, $this->request->data);
            if ($this->Personas->save($persona)) {
                $this->Flash->success(__('The persona has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The persona could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('persona'));
        $this->set('_serialize', ['persona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $persona = $this->Personas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $persona = $this->Personas->patchEntity($persona, $this->request->data);
            if ($this->Personas->save($persona)) {
                $this->Flash->success(__('The persona has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The persona could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('persona'));
        $this->set('_serialize', ['persona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $persona = $this->Personas->get($id);
        if ($this->Personas->delete($persona)) {
            $this->Flash->success(__('The persona has been deleted.'));
        } else {
            $this->Flash->error(__('The persona could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function cuenta () {
        $usId = $this->request->session()->read('Auth.User.username');
        $user = $this -> Personas -> get ($usId , 
            ['contain' => ['personas_direcciones',
            'telefonos_personas', 'tarjetas']]);
		$this -> set ('us', $user);
        if ($this->request->is('post')) {
            //$this -> set ('request', $this->request->data);
            $datos = $this -> request -> data;
			if ($datos ['tipoReq'] == 'generales') {
                // Se actualizan los datos generales del usuario.
				$user [ 'nombre'  ] = $datos ['nombre'];
				$user ['apellido1'] = $datos ['apellido1'];
				$user ['apellido2'] = $datos ['apellido2'];
				$this -> Personas -> save ($user);
				$telefonos = TableRegistry::get('telefonos_personas');
                if (isset ($datos['borrarTrabajo'])) {
                    $porBorrar = $telefonos -> get (
                        ['identificacion' => $datos ['id'],
                        'tipo_tel' => 'Trabajo']
                    );
                    $telefonos -> delete ($porBorrar);
                }
				else if (isset ($datos['telTrabajo']) && $datos ['telTrabajo'] > 0) {
					$telTrabajo = $telefonos -> newEntity();
					$telTrabajo ['identificacion'] = $datos ['id'];
					$telTrabajo ['tipo_tel']       = 'Trabajo';
					$telTrabajo ['telefono']       = $datos['telTrabajo'];
					$telefonos -> save ($telTrabajo);
				}
                if (isset ($datos['borrarCasa'])) {
                    $porBorrar = $telefonos -> get (
                        ['identificacion' => $datos ['id'],
                        'tipo_tel' => 'Casa']
                    );
                    $telefonos -> delete ($porBorrar);
                } else
				if (isset ($datos['telCasa']) && $datos ['telCasa'] > 0) {
					$telCasa = $telefonos -> newEntity();
					$telCasa ['identificacion'] = $datos ['id'];
					$telCasa ['tipo_tel']       = 'Casa';
					$telCasa ['telefono']       = $datos['telCasa'];
					$telefonos -> save ($telCasa);
				}
                if (isset ($datos['borrarOtro'])) {
                    $porBorrar = $telefonos -> get (
                        ['identificacion' => $datos ['id'],
                        'tipo_tel' => 'Otro']
                    );
                    $this -> set ('spooks', $porBorrar);
                    $telefonos -> delete ($porBorrar);
                } else
				if (isset ($datos['telOtro']) && $datos ['telOtro'] > 0) {
					$telOtro = $telefonos -> newEntity();
					$telOtro ['identificacion'] = $datos ['id'];
					$telOtro ['tipo_tel']       = 'Otro';
					$telOtro ['telefono']       = $datos['telOtro'];
					$telefonos -> save ($telOtro);
				}
                if (isset ($datos['borrarCelular'])) {
                    $porBorrar = $telefonos -> get (
                        ['identificacion' => $datos ['id'],
                        'tipo_tel' => 'Celular']
                    );
                    $telefonos -> delete ($porBorrar);
                } else
				if (isset ($datos['telCelular']) && $datos ['telCelular'] > 0) {
					$telCelular = $telefonos -> newEntity();
					$telCelular ['identificacion'] = $datos ['id'];
					$telCelular ['tipo_tel']       = 'Celular';
					$telCelular ['telefono']       = $datos['telCelular'];
					$telefonos -> save ($telCelular);
				}
			} else if ($datos ['tipoReq'] == 'direcciones') {
                // Se actualizan las direcciones.
                $dirs = TableRegistry::get ('personas_direcciones');
                // Como las direcciones utilizan un id, para asegurarse de que
                // quedan las mismas que en la vista, hay que borrarlas e
                // insertarlas de nuevo.
                // Pero antes se revisa si las direcciones ingresadas son
                // correctas para no borrar y luego no poder insertar.
                for ($i=0; $i< $datos ['cantidad']; $i++) {
                    $direc = TableRegistry::get('distritos')-> find ('all')
                    -> where (
                        "nombreProvincia = '".$datos ['provincia'.$i]."' and ".
                        "nombreDistrito = '".$datos ['distrito'.$i]."' and ".
                        "nombreCanton = '".$datos ['canton'.$i]."'"
                    );
                    $existe = false;
                    foreach ($direc as $dir) {
                        $existe = true;
                    }
                    if (!$existe) { // Hay alguna dirección incorrecta.
                        // No se continúa con el borrado e inserción.
                        $this -> Flash -> error ('Una dirección no existe.'
                        .'No se actualizaron los datos.');
                        return $this-> redirect ('personas/cuenta');
                    }
                } // Fin del for de eliminar las direcciones.
                $porBorrar = $dirs->find('all')
                    ->where ("idPersona = '".$datos ['id']."'");
                foreach ($porBorrar as $dirVieja) {
                    $dirs->delete($dirVieja);
                }
                $cantidad = $datos ['cantidad'];
                if (isset($datos['agregar'])) {
                    // Se va a agregar una nueva dirección.
                    $cantidad ++;
                }
				for ($i=0; $i < $cantidad; $i++) {
                    if (isset($datos['borrar'.$i])) {
                        // Ya se borró la dirección, simplemente no se inserta.
                    } else {
                        try {
                        // Se actualizan datos.
                        $nuevaDir = $dirs -> newEntity();
                        $nuevaDir ['idPersona'] = $datos ['id'];
                        $nuevaDir ['nombreProvincia'] = $datos ['provincia'.$i];
                        $nuevaDir ['nombreCanton']    = $datos ['canton'.$i];
                        $nuevaDir ['nombreDistrito']  = $datos ['distrito'.$i];
                        $nuevaDir ['detalles']        = $datos ['detalles'.$i];
                        if (!$dirs -> save ($nuevaDir)) {
                            $this -> Flash -> 
                                error ('Error insertando/actualizando dirección');
                        }} catch (\PDOException $e) {
                            $this -> Flash -> 
                            error ('Error insertando/actualizando dirección');
                        }
                    }
				}
            } else if ($datos ['tipoReq'] == 'tarjetas'){ 
                // Borrado de tarjetas
                $tarjetas = $this -> Personas -> get ($datos['id'], 
                    ['contain' => 'tarjetas']);
                for ($i=0; $i<$datos['cantidad']; $i++){
                    if(isset($datos['borrar'.$i])) {
                        TableRegistry::get('tarjetas')
                            ->delete($tarjetas['tarjetas'][$i]);
                    }
                }
            } else if ($datos ['tipoReq'] == 'AgregarTarjeta'){
				$tarjetas = TableRegistry::get ('tarjetas');
                $tarjeta = $tarjetas -> newEntity();
                $tarjeta ['idTarjeta'] = $datos ['numTarjeta'];
                $tarjeta ['idPersona'] = $usId;
                $tarjeta ['csv']       = $datos ['csv'];
                $http = new Client();
                $response = $http->get('https://psycho-webservice.herokuapp.com',
                    ['numTarjeta' => $datos ['numTarjeta']
					, 'csv' => $datos ['csv']]);
                //$this -> set ('respuesta', $response->body);
                if ($response->body == 'Correcto' ) {
                    if ($tarjetas -> save ($tarjeta) ) {
                        $this->Flash->success ('Datos actualizados correctamente.');
                        return $this->redirect ('/personas/cuenta');
                    } else {
                        $this->Flash->error ('Error insertando datos.');
                    }
                } else {
                    $this->Flash->error('La tarjeta no pudo ser validada.');
                }
            }
            return $this -> redirect ('personas/cuenta');
        } // Fin de si el request es post.
        $this -> render ();
    }

    public function registro () {

        if ($this->request->is('post') && isset ($this->request->data['reg'])) {

            $datosIngresados = $this->request->data;
            $nuevoUsuario = $this->Personas->newEntity();
            $username = $datosIngresados ['username'];
            $password = $datosIngresados ['password'];
            $nuevoUsuario ['identificacion'  ] = $username;
            $nuevoUsuario ['correo'          ] = $datosIngresados ['correo'];
            $nuevoUsuario ['contraseña'      ] = $password;
            $nuevoUsuario ['nombre'          ] = 'null';
            $nuevoUsuario ['apellido1'       ] = 'null';
            $nuevoUsuario ['apellido2'       ] = 'null';
            $nuevoUsuario ['fecha_nacimiento'] = '1985-07-24';
            $tablaUsers = TableRegistry::get('users');
            $nuevoUsuario2 = $tablaUsers->newEntity();
            $nuevoUsuario2 ['username'] = $username;
            $nuevoUsuario2 ['password'] = $password;
            $nuevoUsuario2 ['role']     = 'author';
            if ( $this->Personas->save($nuevoUsuario) && $tablaUsers -> save ($nuevoUsuario2)) {
                $this->Flash->success('Insertado correctamente.');
                $this->redirect('/users/login');
            } else {
                $this->Flash->error('Errror insertando datos.');
            }
        }
        $this->render();
    }

    public function ordenes()
    {
        
        $user = $this->Auth->user('username');
        //var_dump($user);
        $datos = TableRegistry::get('facturas')->find('all')->where("idUsuario = '".$user."'");
        $idFact;
        foreach($datos as $dato):
            $idFact = $dato['idFactura'];
        endforeach;
        $monto = TableRegistry::get('productos_facturas')->find('all')->where("idFactura = '".$idFact."'");
        var_dump($monto);
        
        //var_dump($datos);
        $this->set('fact', $datos);
        //se envian los datos a la vista
        /*$this->set('idFact', $datos['idFactura']);
        $this->set('fecha', $datos['fechaFactura']);
        $this->set('usuario', $datos['idUsuario']);
        $this->set('estado', $datos['estadoCompra']);*/
        $this->render();

    }
}
