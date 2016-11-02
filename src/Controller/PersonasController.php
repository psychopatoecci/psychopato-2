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
        /*$query = $this->Personas->find('all')
        ->where(['Personas.administrador ' => '1'])
        ->contain(['PersonasDirecciones', 'TelefonosPersonas']);*/
      
      
      $query = $this->Personas->find('all')->contain(['personas_direcciones','telefonos_personas']);
      //echo $query;
     // $query = $this->Personas->find('all', ['contain' => ['telefonos_personas', 'personas_direcciones']]);
            //$query = $this -> Personas -> find('all')
            //->contain(['telefonos_personas', 'personas_direcciones']);
        
        /*$query = $this->Personas->find();
        $query->select(['identificacion', 'nombre','apellido1','apellido2','fecha_nacimiento','telefonos_personas.tipo_tel',
        'telefonos_personas.telefono','personas_direcciones.nombreProvincia','personas_direcciones.nombreCanton','personas_direcciones.nombreDistrito','personas_direcciones.detalles'])
        ->join([
        'table' => 'personas_direcciones',
        'conditions' => 'personas_direcciones.idPersona = Personas.identificacion',
        ])
        ->join([
        'table' => 'telefonos_personas',
        'conditions' => 'telefonos_personas.identificacion = Personas.identificacion',
        ]);*/
        /*$condicion = 'telefonos_personas.identificacion = Personas.identificacion, personas_direcciones.idPersona = Personas.identificacion'
        $query = $this->Personas->find('all',array(
        'fields' =>array('telefonos_personas.tipo_tel',
        'telefonos_personas.telefono','personas_direcciones.nombreProvincia','personas_direcciones.nombreCanton','personas_direcciones.nombreDistrito','personas_direcciones.detalles'),'conditions'=> $condicion))
        ->contain(['personas_direcciones','telefonos_personas']);*/

    
           /* $query = $this->Personas->find();
        $query->select(['identificacion', 'personas_direcciones.nombreProvincia']);
            $query->join([
        'table' => 'personas_direcciones',
        'table' => 'telefonos_personas',
        'conditions' => 'personas_direcciones.idPersona = Personas.identificacion', 
        'telefonos_personas.identificacion = Personas.identificacion',
    ]);*/
        $identificacion = [];
        $nombre = [];
        $apellido1 = [];
        $apellido2 = [];
        $fecha = [];
        $provincia=[];
        $canton =[];
        $distrito=[];
        $detalles=[];
        $casa=[];
        $trabajo=[];
        $otro=[];
        $celulares=[];
        // echo $query;
        $idActual;
        $idAnterior = ' ';
        
        //se agregan los id, nombre y precios a distintos arreglos
		  
        foreach ($query as $con) {
            //$idActual=$con['identificacion'];
            //if($idActual != $idAnterior){
                array_push($identificacion, $con['identificacion']);
                array_push($nombre, $con['nombre']);
                array_push($apellido1, $con['apellido1']);
                array_push($apellido2, $con['apellido2']);
                array_push($fecha, $con['fecha_nacimiento']);
                //$idAnterior = $con['identificacion'];
            //}
        
            array_push($provincia, $con['personas_direcciones'][0]['nombreProvincia']);
            array_push($canton, $con['personas_direcciones'][0]['nombreCanton']);
            array_push($distrito, $con['personas_direcciones'][0]['nombreDistrito']);
            array_push($detalles, $con['personas_direcciones'][0]['detalles']);
            array_push($casa, $con['telefono'][0]['telefono']);
            
            /*if($con['telefonos_personas'][0]['tipo_tel'] == 'Casa'){
            array_push($casa, $con['telefono'][0]['telefono']);
            } 
            else {
                if($con['telefonos_personas'][0]['tipo_tel'] == 'Celular'){
                    array_push($celulares, $con['telefonos_personas'][0]['telefono']);
                } 
                else {
                    if($con['telefonos_personas'][0]['tipo_tel'] == 'Trabajo'){
                        array_push($trabajo, $con['telefonos_personas'][0]['telefono']);
                    }       
                    else {
                        array_push($otro, $con['telefonos_personas'][0]['telefono']);
                    }
                }
            }*/
        }
        
       
        //se envian los datos obtenidos a la vista
        $this -> set ('spooks', $query);
        $this -> set ('Identificacion', $identificacion);
        $this -> set ('nombre', $nombre );
        $this -> set ('apellido1', $apellido1 );
        $this -> set ('apellido2', $apellido2 );
        $this -> set ('fecha', $fecha );
        $this -> set ('provincia', $provincia );
        $this -> set ('canton', $canton );
        $this -> set ('distrito', $distrito );
        $this -> set ('detalles', $detalles );
        //$this -> set ('trabajo', $trabajo );
       // $this -> set ('otro', $otro );
        //$this -> set ('celulares', $celulares );
        $this -> set ('casa', $casa );
        

        $this -> set ('trabajo', $casa );
        $this -> set ('otro', $casa );
        $this -> set ('celulares', $casa );
      
        //$this->render();
        
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
        $http = new Client();
        if ($this->request) {
            //$this->set ('spooks', $this->request->query);
            $qu = $this->request->query;
            if ($qu) {
                $tarjetas = TableRegistry::get('tarjetas');
                $tarjeta = $tarjetas -> newEntity();
                $tarjeta ['idTarjeta'] = $qu ['numTarjeta'];
                $tarjeta ['idPersona'] = $this->Auth->user('username');
                $tarjeta ['csv']       = $qu ['csv'];
                $response = $http->get('https://psycho-webservice.herokuapp.com',
                    ['numTarjeta' => $qu ['numTarjeta'], 'csv' => $qu ['csv']]);
                //$this -> set ('respuesta', $response->body);
                if ($response->body == 'Incorrecto' ) {
                    $this->Flash->error('La tarjeta no pudo ser validada.');
                } else if ($tarjetas -> save ($tarjeta) ) {
                    $this->Flash->success ('Datos actualizados correctamente.');
                } else {
                    $this->Flash->error ('Error insertando datos.');
                }
            }
        } else {
        }
    }
}
