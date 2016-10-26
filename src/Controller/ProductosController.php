<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
    /**
     * funcion catalogo
     * fucion para mostrar el catalogo
     * se obtinen las consolas de la base de datos
     * se extrae de la base de datos el idProducto, nombreProducto y el precio, de las entidades que se encuentren en la tabla consola
     * se envia la informacion obtenida a la vista
     * 
     * falta terminar
     */
    public function catalogo()
    {
        //obtener plataformas
        // se extrae de la base de datos el idProducto, nombreProducto y el precio, de las entidades que se encuentren en la tabla consola
        
        /*$condicion =array('Productos.idProducto = consolas.idConsola');
        $query = $this -> Productos -> find ('all', array(
        'fields' => array('Productos.idProducto','Productos.precio','Productos.nombreProducto'),'
        conditions'=>$condicion))->contain(['consolas']);*/
        
        //se crea la sentencia sql
        $query = $this->Productos->find('all')->contain(['consolas']);
        $idConsolas = [];
        $precioConsolas = [];
        $nombreConsolas = [];
        //se agregan los id, nombre y precios a distintos arreglos
        foreach ($query as $con) {
          array_push($idConsolas, $con->idProducto);
          array_push($precioConsolas, $con->precio);
          array_push($nombreConsolas, $con->nombreProducto);
        }
        
        
        //se envian los datos obtenidos a la vista
        $this -> set ('idConsolas', $idConsolas );
        $this -> set ('precioConsolas', $precioConsolas );
        $this -> set ('nombreConsolas', $nombreConsolas );
        //se llama a la vista
        
        
        //Codigo en desarrollo, falta obtener los datos de juegos fisicos, juegos digitales, etc
        //buscar  juegos digitales
        /* $query = $this -> Productos -> find ('all', array(
         'fields' => array('Productos.idProducto','Productos.precio','Productos.nombreProducto'),'
         conditions'=>array('video_juegos.idVideoJuegos = video_juegos_digitals.idVideoJuegoDigital')))->contain(['video_juegos','video_juegos.video_juego_digitals']);
        //echo $query; 
        $idJuegoD = [];
        $precioJuegoD = [];
        $nombreJuegoD = [];
        foreach ($query as $con) {
          array_push($idJuegoD, $con['idProducto']);
          array_push($precioJuegoD, $con['precio']);
          array_push($nombreJuegoD, $con['nombreProducto']);
        }
        $this -> set ('idJuegoD', $idJuegoD );
        $this -> set ('precioJuegoD', $precioJuegoD );
        $this -> set ('nombreJuegoD', $nombreJuegoD );*/
        
       //$this->render();
    
         /**!----CODIGO DE PRUEBA NO BORRAR--------->***/
         
        // $query = $this->Productos->find('all')->contain(['video_juegos']);
        // $this -> set ('query', $query);
     /**!----CODIGO DE PRUEBA NO BORRAR--------->***/
     
     
 /*  $productos = $this->Productos->find('all');
        $this->set('productos',$productos);*/
        
    }
    /**
     * funcion detalles
    *funcion para mostrar detalles de un producto
    * llama la vista  detalles, recibe como parametro el id del producto y lo usa para obtener el resto de la informacio
    * se busca en la base de datos la informacion del producto con idProducto igual al dato que se recibe como parametro
    * se envia la informacion obtenida a la vista
    */
    public function detalles($prodId)
    {
        // llama la vista  detalles, recibe como parametro el id del producto y lo usa para obtener el resto de la informacion
        
        //se busca en la base de datos la informacion del producto con idProducto igual al dato que se recibe como parametro
        $producto = $this -> Productos -> get ($prodId);
        $this -> set ('nombre', $producto ['nombreProducto']);
        $this -> set ('IDProducto', $prodId);
        $this -> set ('precio', $producto ['precio']);
        $this -> set ('portada', $producto ['imagen']);
        $this -> set ('categoria', StrVal($producto ['tipo']));
        $this->render();
    }
        /**
     * funcion detalles
    *funcion para mostrar detalles de un producto
    * llama la vista  detalles, recibe como parametro el id del producto y lo usa para obtener el resto de la informacio
    * se busca en la base de datos la informacion del producto con idProducto igual al dato que se recibe como parametro
    * se envia la informacion obtenida a la vista
    */
    public function detallesprueba($codigo)
    {
        //llama la vista  detalles, recibe como parametro el id del producto y lo usa para obtener el resto de la informacion
        
        //se busca en la base de datos la informacion del producto con idProducto igual al dato que se recibe como parametro
        $producto = $this -> Productos -> get ($codigo);
        $this -> set ('nombre', $producto ['nombreProducto']);
        $this -> set ('IDProducto', $codigo);
        $this -> set ('precio', $producto ['precio']);
        $this -> set ('portada', $producto ['imagen']);
        $this -> set ('categoria', StrVal ($producto ['tipo']));
        $this -> set ('descripcion', $producto ['descripcion']);
        //$query = $this -> Productos -> find('all')->contain(['video_juegos']);
        
        //se crea una sentencia sql que realiza join de las tablas producto, consola y videoJuego para obtener los generos y las plataformas
        $condicion =array('video_juegos.idVideoJuego =' => $codigo);
        $query = $this -> Productos -> find('all',array(
            'fields' => array('video_juegos.genero', 'productos.nombreProducto'),
            'conditions'=> $condicion ))
            ->contain(['video_juegos', 'video_juegos.consolas.productos']);
        //$descripcion;
        foreach ($query as $qu) {
            $this-> set ('genero', $qu['generos']['genero']);
            $this-> set ('plataforma', $qu['productos']['nombreProducto']);
        }
        //echo $descripcion;
        $this->render();
    }
    /** 
     * funcion para mostrar ofertas
    */
    public function ofertas()
    {
        $this->render();
    }
     /** 
     funcion para mostrar la ventana de administracion de productos
     */
    public function AdminProductos()
    {
        $this->render();
    }
     /** 
     funcion para mostrar la ventana de error 404
     */
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
    /**
     * funcion nuevoProducto
     * funcion para mostrar la ventana de insertar productos
     * se recuperan las consolas disponibles en la base de datos y se envian en un arreglo para mostrarlas
     * la vista espera a que se oprima el boton de guardar
     * se extrae los datos ingresados en los contenedores de la vista
     * se guarda el producto en la base de datos
    */
    public function NuevoProducto(){
        //se recuperan las consolas disponibles en la base de datos
        $nuevoProd = $this -> Productos -> newEntity ();
        $this -> set (compact ('nuevoProd'));
        $condicion = array('Productos.idProducto = consolas.idConsola');
        $consolas = $this -> Productos -> find ('all', array(
            'fields' => array('Productos.nombreProducto'),
            'conditions'=> $condicion ))
            ->contain(['consolas']);
        //se envian las consolas disponibles en un arreglo para mostrarlas
        $consolaArray = [];
        foreach ($consolas as $con) {
          array_push($consolaArray, $con['nombreProducto']);
        }
        $this -> set ('opcionesConsola', $consolaArray);
        //se espera a que se oprima el boton de guardar
        if ($this-> request->is('post')) {
            //se extrae los datos ingresados en los contenedores de la vista
            $datos = $this -> request -> data;
            $nuevoProd -> idProducto     = $datos ['identificador'];
            $nuevoProd -> nombreProducto = $datos ['nombreProducto'];
            $nuevoProd -> descripcion    = $datos ['descripcion'];
            $nuevoProd -> precio         = $datos ['precio'];
            $nuevoProd -> fabricante     = $datos ['fabricante'];
            $nuevoProd -> tipo           = $datos ['tipo'];
            $nuevoProd -> idConsola      = $datos ['consola'];
            $vid = $datos ['tipo'] > 0;
            //se guarda el producto en la base de datos
            if (TableRegistry::get('Productos') -> save ($nuevoProd)) {
                if ($vid) {
                    // Hay que insertar los datos en videojuego.
                    $videoJ = TableRegistry::get ('video_juegos') -> newEntity ();
                    $videoJ -> idVideoJuego = $datos ['identificador'];
                    $videoJ -> ESRB = 4;
                    $videoJ -> reqMin = 'OpenGL 1';
                    $videoJ -> reqMax = 'Ninguno';
                    $videoJ -> IdConsola = $datos ['consola'];
                    $videoJ -> genero = $datos ['genero'];
                    TableRegistry::get ('video_juegos') -> save ($videoJ);
                } else {
                    
                }
                //se imprime un mensaje informando que se realizo el insert de forma exitosa
                $this -> Flash -> success ('Insertado correctamente');
            } else {
                //si falla el insert se imprime un mensaje de error
                $this -> Flash -> error ('Error insertando.');
            }
        }
        //$this -> render();
    }
    /* funcion para mostrar la ventana de actualizar productos*/
    public function actualizar(/*$id, $nombre, $tipo, $imagen, $precio, $fabricante*/)
    {  
        /*$id = 'PROD202188';
        $nombre = "b";
        $tipo = "c";
        $imagen = "d"; 
        $precio = "e"; 
        $fabricante = "f";
        //$query = ('UPDATE INTO Productos'.array($id $nombre, $tipo, $imagen, $precio, $fabricante));
        //echo $query; 
        $query ='UPDATE Productos SET nombreProducto ='."'".$nombre."'".', fabricante = '."'".$fabricante."'".', WHERE idProducto ='."'".$id."'".')';
        echo $query;*/
        
    }
    
    /* funcion para mostrar la ventana de administracion de Usuarios*/
    public function AdminUsuarios()
    {
        $this->render();
    }  
    /* funcion para mostrar la ventana de insertar  usuarios*/
    public function nuevousuario()
    {
        $this->render();
    }
}