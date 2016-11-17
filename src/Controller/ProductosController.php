<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * productos Controller
 *
 * @property \App\Model\Table\ProductosTable $Productos
 */
class ProductosController extends AppController
{
    /**
     * controlador para la pagina principal
     */
    public function index()
    {
        $productos = $this->Productos->find('all');
        $nombresProd = [];
        $preciosProd = [];
        $descrProd   = [];
        $idProd      = [];
        foreach ($productos as $producto) {
            $nombresProd[] = $producto['nombreProducto'];
            $preciosProd[] = $producto['precio'];
            $descrProd  [] = $producto['descripcion'];
            $idProd     [] = $producto['idProducto'];
        }
        $this->set('nombresProductos',$nombresProd);
        $this->set('preciosProductos',$preciosProd);
        $this->set('subtitulos1',$descrProd);
        $this->set('idProd', $idProd);
        $this->set('user', $this->Auth->user('id'));
        
       // $carrito_compras = $this->Carrito_compras->find('all');
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
    public function catalogo() {
        //obtener plataformas
        // se extrae de la base de datos el idProducto, nombreProducto y el precio, de las entidades que se encuentren en la tabla consola
        
        /*$condicion =array('Productos.idProducto = consolas.idConsola');
        $query = $this -> Productos -> find ('all', array(
        'fields' => array('Productos.idProducto','Productos.precio','Productos.nombreProducto'),'
        conditions'=>$condicion))->contain(['consolas']);*/
         
        //se crea la sentencia sql
        $query = $this->Productos->find('all');
        $idConsolas       = [];
        $idFisicos        = [];
        $idDigitales      = [];
        $precioConsolas   = [];
        $precioFisicos    = [];
        $precioDigitales  = [];
        $nombreConsolas   = [];
        $nombreFisicos    = [];
        $nombreDigitales  = [];
        $generoFisicos    = [];
        $generoDigitales  = [];
        $consolaFisicos   = [];
        $consolaDigitales = [];
        //se agregan los id, nombre y precios a distintos arreglos
        foreach ($query as $con) {
            $tipo = $con['tipo'];
            if ($tipo == 1) {
                array_push($idFisicos, $con->idProducto);
                array_push($precioFisicos, $con->precio);
                array_push($nombreFisicos, $con->nombreProducto);
                array_push($generoFisicos, 'aventura');
                array_push($consolaFisicos, 'ps4');
            } else if ($tipo == 2) {
                array_push($idDigitales, $con->idProducto);
                array_push($precioDigitales, $con->precio);
                array_push($nombreDigitales, $con->nombreProducto);
                array_push($generoDigitales, 'aventura');
                array_push($consolaDigitales, 'ps4');
            } else if ($tipo == 3) {
                array_push($idConsolas, $con->idProducto);
                array_push($precioConsolas, $con->precio);
                array_push($nombreConsolas, $con->nombreProducto);
            }
        }
        
        //se envian los datos obtenidos a la vista
        $this -> set ('idConsolas', $idConsolas);
        $this -> set ('precioConsolas', $precioConsolas);
        $this -> set ('nombreConsolas', $nombreConsolas);
        $this -> set ('idFisicos', $idFisicos);
        $this -> set ('precioFisicos', $precioFisicos);
        $this -> set ('nombreFisicos', $nombreFisicos);
        $this -> set ('generoFisicos', $generoFisicos);
        $this -> set ('consolaFisicos',$consolaFisicos);
        $this -> set ('idDigitales', $idDigitales);
        $this -> set ('precioDigitales', $precioDigitales);
        $this -> set ('nombreDigitales', $nombreDigitales);
        $this -> set ('generoDigitales', $generoDigitales);
        $this -> set ('consolaDigitales',$consolaDigitales);
        //se llama a la vista
        
        //Botón de añadir al carrito (aun no sirve T.T)
        $addcarrito = TableRegistry::get('wish_list_productos')->newEntity();

        if($this->request->is('post')) {
            $addcarrito = TableRegistry::get('carrito_compras')->patchEntity($addcarrito, $this->request->data);

            if(TableRegistry::get('carrito_compras')->save($addcarrito)) {
                $this->Flash->success('Producto añadido al carrito de compras.');
                //Redirecciona al carrito del usuario:
                return $this->redirect(['action' => '../carrito/'.$this->request->session()->read('Auth.User.username')]);
            }
            else {
                $this->Flash->error('El producto no se ha añadido debido a un error.');
            }
        }

        $this->set(compact('addcarrito'));
    }

    /**
    * funcion detalles
    * @param string $codigo producto codigo
    *funcion para mostrar detalles de un producto
    * llama la vista  detalles, recibe como parametro el id del producto y lo usa para obtener el resto de la información
    * se busca en la base de datos la informacion del producto con idProducto igual al dato que se recibe como parametro
    * se envia la informacion obtenida a la vista
    */
    public function detalles($codigo) {
        //llama la vista  detalles, recibe como parametro el id del producto y lo usa para obtener el resto de la informacion
        
        //se busca en la base de datos la informacion del producto con idProducto igual al dato que se recibe como parametro
        $producto = $this -> Productos -> get ($codigo);
        $this -> set ('nombre', $producto ['nombreProducto']);
        $this -> set ('IDProd', $codigo);
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
            $this-> set ('genero', $qu['video_juegos']['genero']);
            $this-> set ('plataforma', $qu['productos']['nombreProducto']);
        }
        //echo $descripcion;
        
        //Botones de añadir al carrito y wishlist
        $addcarrito = TableRegistry::get('wish_list_productos')->newEntity();
        $addwishlist = TableRegistry::get('wish_list_productos')->newEntity();
 
        if($this->request->is('post')) {
            //debug ($this->request->data);
            //debug ($addcarrito);
            
            if (isset($this->request->data['BotonCarrito'])) {
               $addcarrito = TableRegistry::get('carrito_compras')->patchEntity($addcarrito, $this->request->data);

                if(TableRegistry::get('carrito_compras')->save($addcarrito)) {
                    $this->Flash->success('Producto añadido al carrito de compras.');
                    //Redirecciona al carrito del usuario:
                    return $this->redirect(['action' => '../carrito/'.$this->request->session()->read('Auth.User.username')]);
                }
                else {
                    $this->Flash->error('El producto no se ha añadido debido a un error.');
                }
            } else if (isset($this->request->data['BotonWishlist'])) {
                $addwishlist = TableRegistry::get('wish_list_productos')->patchEntity($addwishlist, $this->request->data);
    
                if(TableRegistry::get('wish_list_productos')->save($addwishlist)) {
                    $this->Flash->success('Producto añadido a la wishlist.');
                    //Redirecciona a la wishlist del usuario:
                    return $this->redirect(['action' => '../wishlist/'.$this->request->session()->read('Auth.User.username')]);
                }
                else {
                    $this->Flash->error('El producto no se ha añadido debido a un error.');
                }
            }
        }
        
        $this->set(compact('addcarrito'));
        $this->set(compact('addwishlist'));
    }
    
    //Controlador del carrito
    public function carrito($codigo) {

        $datos = TableRegistry::get('carrito_compras')->find('all')->where("idPersona = '".$codigo."'");
        $this -> set ('datos', $datos);
        
        $datos2 = TableRegistry::get('productos')->find('all');
        $this -> set ('datos2', $datos2);
        
        //Ejemplo: http://psychopatonan-jjjaguar.c9users.io/carrito/Heber74

    }
    
    //Controlador de la wishlist
    public function wishlist($codigo) {

        $datos = TableRegistry::get('wish_list_productos')->find('all')->where("identificacionPersona = '".$codigo."'");
        $this -> set ('datos', $datos);
        
        $datos2 = TableRegistry::get('productos')->find('all');
        $this -> set ('datos2', $datos2);
        
        //Ejemplo: http://psychopatonan-jjjaguar.c9users.io/wishlist/Emmett94
    }
   
    //Controlador de ofertas y combos
    public function ofertas() {
       /* $numPage = 1;
        $nuevaPag = $this -> request -> query('nuevaPag');
        
        if ($nuevaPag && $nuevaPag > 0) {
            $numPage = $nuevaPag;
        }
        */
        $ofertas = $this -> Productos -> find ('all', 
            ['contain' => ['ofertas']]);
            
       /* $ofertas = $ofertas -> limit(16) -> page ($numPage);
        $this -> set ('numPage', $numPage);*/
        $this->set('ofertas', $ofertas);
            
        $combos = $this -> Productos -> find ('all', 
            ['contain' => ['combos', 'productosCombos']]);
            $this->set('combos', $combos);
        
    }
    
     /** 
     funcion para mostrar la ventana de administracion de productos
    * llama la vista  adminUsuarion
    * se busca en la base de datos la informacion de los productos (tablas preoductos, video_juegos, generos)
    * se envia como parametros los datos de cada usuario (nombre, identificacion, etc)
    */
    public function AdminProductos() {
        
        //$query = $this->Productos->find('all')->contain('video_juegos');
        
        $query = $this->Productos->find('all');
        $generos = TableRegistry::get('video_juegos');
        
        $idProducto =[];
        $nombre =[];
        $consola =[];
        $tipo =[];
        $precio =[];
        $genero =[];
        $descripciones =[];
        $fabricantes =[];
        foreach ($query as $con) {
            array_push($nombre,$con['nombreProducto']);
            array_push($idProducto,$con['idProducto']);
            array_push($tipo,$con['tipo']);
            array_push($precio,$con['precio']);
            array_push($descripciones,$con['descripcion']);
            array_push($fabricantes,$con['fabricante']);
            if($con['tipo']==3){
                array_push($consola, NULL);
            }
            $qu2 = $generos -> find('all')->where(['idVideoJuego' => $con['idProducto']]);
            foreach ($qu2 as $con2) {
                array_push($consola, $con2['idConsola']);
                array_push($genero, $con2['genero']);
            } 
        }
        $this -> set ('spooks', $query);
        $this -> set ('idProducto', $idProducto);
        $this -> set ('nombre', $nombre );
        $this -> set ('consola', $consola );
        $this -> set ('tipo', $tipo );
        $this -> set ('precio', $precio );
        $this -> set ('genero', $genero );
        $this -> set ('descripciones', $descripciones );
        $this -> set ('fabricantes', $fabricantes );
        $this -> set ('genero', $genero );
        
       // $this->render();
    }
    
    //Controlador del error 404
    public function error404() {
        $this->render();
    }
    
    //Controlador de confirmación de una compra
    public function confirmar() {
        $this->render();
    }
    
    
    //Controlador del upload
    public function upload() {
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
    /**
    *funcion para mostrar la ventana de actualizar productos
    */
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
    
}
