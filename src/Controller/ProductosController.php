<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

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
     public function busqueda(){
        $url = $this->request->here();
        $busqueda =  Text::tokenize($url, '=', " ", " "); 
        $prod=$this->Productos->find('all',['contain' => ['ofertas']]);
        if ($busqueda[1]) {
            $prod = $prod -> where ("nombreProducto LIKE '%".$busqueda[1]."%'");
            $this -> set ('buscando', $busqueda[1]); 
        }
        $this->set('prod', $prod);
        $this->render;
     }
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
        
        //Botón de añadir al carrito
        $addcarrito = TableRegistry::get('wish_list_productos')->newEntity();

        if($this->request->is('post')) {
            $addcarrito = TableRegistry::get('carrito_compras')->patchEntity($addcarrito, $this->request->data);
            
            if(TableRegistry::get('carrito_compras')->save($addcarrito)) {
                $this->Flash->success('Producto añadido al carrito de compras.');
                //Redirecciona al carrito del usuario:
                return $this->redirect(['action' => '../carrito/'.$this->request->session()->read('Auth.User.username')]);
                debug ($addcarrito);
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
    * funcion para mostrar detalles de un producto
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
    public function carrito($codigo = null) {
        if ($codigo==null) {
            $codigo = $this->request->session()->read('Auth.User.username');
        }
        
        $datos = TableRegistry::get('carrito_compras')->find('all')->where("idPersona = '".$codigo."'");
        $this -> set ('datos', $datos);
        
        $datos2 = TableRegistry::get('productos')->find('all');
        $this -> set ('datos2', $datos2);
        
        //Botón de borrar producto del carrito
        $DatosBoton = TableRegistry::get('wish_list_productos')->newEntity();
        
        if($this->request->is('post')) {
            $DatosBoton = TableRegistry::get('carrito_compras')->patchEntity($DatosBoton, $this->request->data);
            $LlavePrimaria = array($DatosBoton['idPersona'],$DatosBoton['idProducto']);
            $TuplaBorrar = TableRegistry::get('carrito_compras')-> get ($LlavePrimaria);

            if(TableRegistry::get('carrito_compras')->delete($TuplaBorrar)) {
                $this->Flash->success('Producto borrado del carrito de compras.');
                return $this->redirect(['action' => '../carrito/'.$codigo]);
            }
            else {
                $this->Flash->error('El producto no se ha borrado debido a un error.');
            }
        }

        $this->set(compact('DatosBoton'));
        
        //Ejemplo: http://psychopatonan-jjjaguar.c9users.io/carrito/Heber74

    }
    
    //Controlador de la wishlist
    public function wishlist($codigo = null) {
        if ($codigo==null) {
            $codigo = $this->request->session()->read('Auth.User.username');
        }
        
        $datos = TableRegistry::get('wish_list_productos')->find('all')->where("identificacionPersona = '".$codigo."'");
        $this -> set ('datos', $datos);
        
        $datos2 = TableRegistry::get('productos')->find('all');
        $this -> set ('datos2', $datos2);
        
        //Botones de añadir al carrito y borrar producto de wishlist
        $addcarrito = TableRegistry::get('wish_list_productos')->newEntity();
        $DatosBoton = TableRegistry::get('wish_list_productos')->newEntity();

        if($this->request->is('post')) {
            if (isset($this->request->data['BotonCarrito'])) {
                $addcarrito = TableRegistry::get('carrito_compras')->patchEntity($addcarrito, $this->request->data);
                
                if(TableRegistry::get('carrito_compras')->save($addcarrito)) {
                    $this->Flash->success('Producto añadido al carrito de compras.');
                    return $this->redirect(['action' => '../carrito/'.$this->request->session()->read('Auth.User.username')]);
                }
                else {
                    $this->Flash->error('El producto no se ha añadido debido a un error.');
                }
            } else if (isset($this->request->data['BotonBorrar'])) {
                $DatosBoton = TableRegistry::get('wish_list_productos')->patchEntity($DatosBoton, $this->request->data);
                $LlavePrimaria = array($DatosBoton['identificacionPersona'],$DatosBoton['idProducto'],$DatosBoton['idWishList']);
                $TuplaBorrar = TableRegistry::get('wish_list_productos')-> get ($LlavePrimaria);
    
                if(TableRegistry::get('wish_list_productos')->delete($TuplaBorrar)) {
                    $this->Flash->success('Producto borrado de la wishlist.');
                    return $this->redirect(['action' => '../wishlist/'.$codigo]);
                }
                else {
                    $this->Flash->error('El producto no se ha borrado debido a un error.');
                }
            }
 
        }
        
        $this->set(compact('addcarrito'));
        $this->set(compact('DatosBoton'));
        
        //Ejemplo: http://psychopatonan-jjjaguar.c9users.io/wishlist/Emmett94
    }
    
        
    //Controlador de confirmación de una compra
    public function confirmar($codigo = null) {
        if ($codigo==null) {
            $codigo = $this->request->session()->read('Auth.User.username');
        }
        
        $DatosTarjetas = TableRegistry::get('tarjetas')->find('all')->where("idPersona = '".$codigo."'");
        $this -> set ('DatosTarjetas', $DatosTarjetas);
        
        $DatosDirecciones = TableRegistry::get('personas_direcciones')->find('all')->where("idPersona = '".$codigo."'");
        $this -> set ('DatosDirecciones', $DatosDirecciones);
        
        $DatosCarrito = TableRegistry::get('carrito_compras')->find('all')->where("idPersona = '".$codigo."'");
        $this -> set ('DatosCarrito', $DatosCarrito);
        
        $DatosProductos = TableRegistry::get('productos')->find('all');
        $this -> set ('DatosProductos', $DatosProductos);
        
        //Botón de completar compra
        $addfactura = TableRegistry::get('facturas')->newEntity();

        if($this->request->is('post')) {
            $addfactura = TableRegistry::get('facturas')->patchEntity($addfactura, $this->request->data);
            
            if(TableRegistry::get('facturas')->save($addfactura)) {
                
                //Agregar los productos a la tabla productos_facturas
                $ProductosFactura = $this->request->data('idProducto');
                $CantidadesFactura = $this->request->data('cantidad');
                debug($CantidadesFactura);
                
                for ($i=0; $i<Count($ProductosFactura); $i++) {
                    $data = [
                        'idFactura'    => $this->request->data('idFactura'),
                        'idProducto' => $ProductosFactura[$i],
                        'cantidad' => $CantidadesFactura[$i]
                    ];
                    $inserciones = TableRegistry::get('productos_facturas')->newEntity();
                    TableRegistry::get('productos_facturas')->patchEntity($inserciones, $data);
                    TableRegistry::get('productos_facturas')->save($inserciones);
                    
                    //Borrar los productos del carrito
                    $LlavePrimaria = array($codigo,$ProductosFactura[$i]);
                    $TuplaBorrar = TableRegistry::get('carrito_compras')-> get ($LlavePrimaria);
                    TableRegistry::get('carrito_compras')->delete($TuplaBorrar);
                }

                $this->Flash->success('Orden realizada con éxito');
                return $this->redirect(['action' => '../ordenes']);
            }
            else {
                $this->Flash->error('La órden no se ha completado debido a un error.');
            }

        }
        
        $this->set(compact('addfactura'));
    }
   
    //Controlador de ofertas y combos
    public function ofertas() {
        $numPage = 1;
        $nuevaPag = $this -> request -> query('nuevaPag');
        
        if ($nuevaPag && $nuevaPag > 0) {
            $numPage = $nuevaPag;
        }
        
        $ofertas = $this -> Productos -> find ('all', 
            ['conditions'=>['ofertas.idProducto = Productos.idProducto'],
            'contain' => ['ofertas','productosCombos']]);
        $ofertas = $ofertas -> limit(16) -> page ($numPage);
        $this -> set ('numPage', $numPage);
        $this->set('ofertas', $ofertas);
            
        $combos = TableRegistry::get('combos');
        $query = $combos->query();    
        $query = $query -> limit(16) -> page ($numPage);
        $this->set('combos', $query);
        
    }
    
     /** 
     funcion para mostrar la ventana de administracion de productos
    * llama la vista  adminUsuarion
    * se busca en la base de datos la informacion de los productos (tablas preoductos, video_juegos, generos)
    * se envia como parametros los datos de cada usuario (nombre, identificacion, etc)
    */
    public function AdminProductos() {
        $generosTabla  = TableRegistry::get ('generos');
        $videoJuegosT  = TableRegistry::get ('video_juegos');
        $consolasTabla = TableRegistry::get ('consolas');
        $productos = $this -> Productos;
        if ($this -> request -> is ('post')) {
            $datos = $this -> request -> data;
            if (isset ($datos['actualizar'])) {
                $porInsertar = $productos -> newEntity ();
                $porInsertar ['idProducto'    ] = $datos ['id'         ];
                $porInsertar ['nombreProducto'] = $datos ['nombre'     ];
                $porInsertar ['tipo'          ] = $datos ['Categoria'  ];
                $porInsertar ['precio'        ] = $datos ['precio'     ];
                $porInsertar ['descripcion'   ] = $datos ['descripcion'];
                $porInsertar ['fabricante'    ] = $datos ['fabricante' ];
                $exitoso = true;
                if (!$productos -> save ($porInsertar))
                    $exitoso = false;
                $porBorrar = $generosTabla
                    -> find ('all')
                    -> where ("idVideoJuego = '".$datos['id']."'");
                foreach ($porBorrar as $tupla) {
                    $generosTabla -> delete ($tupla);
                }
                if ($datos ['Categoria'] == 'Juego digital'
                    || $datos ['Categoria'] == 'Juego físico') {
                    $porInsertar = $videoJuegosT -> get ($datos['id']);
                    $porInsertar ['idConsola'] = $datos ['Plataforma'];
                    $porInsertar ['genero']    = $datos ['Genero'];
                    if (!$videoJuegosT -> save ($porInsertar))
                        $exitoso = false;
                    //$generoN = $generosTabla -> newEntity ();
                    //$generoN ['idVideoJuego'] = $datos ['id'];
                    //$generoN ['genero'      ] = $datos ['Genero'];
                    //if(!$generosTabla -> save ($generoN))
                    //    $exitoso = false;
                }
                if ($exitoso) {
                    $this -> Flash -> success ('Cambios realizados con éxito');
                } else {
                    $this -> Flash -> error ('Hubo un problema, inténtelo nuevamente.');
                }
            } else if (isset ($datos ['borrar'])) {
                $porBorrar = $productos -> get ($datos ['borrar']);
                $productos -> delete ($porBorrar);
            }
        }
        
        $query = $productos -> find('all') -> contain ('video_juegos');
        
        $this -> set ('productos', $query);
        $this -> set ('generos', $generosTabla
            -> find ('all'));
        $this -> set ('consola', $consolasTabla 
            -> find ('all') -> contain ('productos'));
    }

    
    //Controlador del error 404
    public function error404() {
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
