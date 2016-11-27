<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Network\Http\Client;

/**
 * productos Controller
 *
 * @property \App\Model\Table\ProductosTable $Productos
 */
class ProductosController extends AppController {
      /**
     * funcion busqueda
     * fucion para realizar Busquedas
     * se busca segun el nombre del producto
     * se extrae de la base de datos el idProducto, nombreProducto y el precio, de las entidades que se encuentren en la tabla consola
     * se envia la informacion obtenida a la vista
     * 
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
     
     /**
     * funcion index
     * muestra la pagina principal
     * 
     */
    public function index() {
        $datos = $this->Productos->find('all');
        $this -> set ('datos', $datos);
        
        //Botones de añadir al carrito y wishlist
        $addcarrito = TableRegistry::get('wish_list_productos')->newEntity();
        $addwishlist = TableRegistry::get('wish_list_productos')->newEntity();
 
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
                
            } else if (isset($this->request->data['BotonWishlist'])) {
                $addwishlist = TableRegistry::get('wish_list_productos')->patchEntity($addwishlist, $this->request->data);
    
                if(TableRegistry::get('wish_list_productos')->save($addwishlist)) {
                    $this->Flash->success('Producto añadido a la wishlist.');
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
    
    /**
     * funcion catalogo
     * fucion para mostrar el catalogo
     * se obtinen las consolas de la base de datos
     * se extrae de la base de datos el idProducto, nombreProducto y el precio, de las entidades que se encuentren en la tabla consola
     * se envia la informacion obtenida a la vista
     * 
     *
     */
    public function catalogo($codigo = null) {
        
        if ($codigo==null) {
            $codigo = "fisicos";
        }
        
        $this -> set ('TipoVista', $codigo);
        $this->set(compact('TipoVista'));
        
        $datos = $this->Productos->find('all');
        $this -> set ('datos', $datos);
        
        $datos2 = TableRegistry::get('video_juegos')->find('all');
        $this -> set ('datos2', $datos2);

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
    * @param string $codigo producto.codigo
    * funcion para mostrar detalles de un producto
    * llama la vista  detalles, recibe como parametro el id del producto y lo usa para obtener el resto de la información
    * se busca en la base de datos la informacion del producto con idProducto igual al dato que se recibe como parametro
    * se envia la informacion obtenida a la vista
    */
    public function detalles($codigo) {
        //llama la vista  detalles, recibe como parametro el id del producto y lo usa para obtener el resto de la informacion
        
        //se busca en la base de datos la informacion del producto con idProducto igual al dato que se recibe como parametro
        $oferta = TableRegistry::get('ofertas');
        $detallesOferta = $oferta->find('all')->where("idProducto = '".$codigo."'");
        $descuento=[];
        foreach ($detallesOferta as $detallesO) {
          array_push($descuento, $detallesO['descuento']);
        }
        $producto = $this -> Productos -> get ($codigo);
        $this -> set ('nombre', $producto ['nombreProducto']);
        $this -> set ('IDProd', $codigo);
        $this -> set ('precio', $producto ['precio']);
        $this -> set ('portada', $producto ['imagen']);
        $this -> set ('categoria', StrVal ($producto ['tipo']));
        $this -> set ('descripcion', $producto ['descripcion']);
        $this -> set ('descuento', $descuento);
        $query = $this -> Productos -> find('all')->contain(['video_juegos']);
        

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
    
    /**
    * funcion carrito
    * @param string $codigo producto.codigo
    * funcion para agregar producto al carrito de compras y mostrarle el carrito al usuario
    * si recibe un parametro (id del producto) lo agrega a la tabla carrito junto al id del usuario
    */
    public function carrito($codigo = null) {
        if ($codigo==null) {
            $codigo = $this->request->session()->read('Auth.User.username');
        }
        
        $datos = TableRegistry::get('carrito_compras')->find('all')->where("idPersona = '".$codigo."'");
        $this -> set ('datos', $datos);
        $oferta = TableRegistry::get('ofertas');
        
        $descuentos=[];
        $numProductos=0;
        foreach ($datos as $dat) {
            $numProductos++;
            $detallesOferta = $oferta->find('all')->where("idProducto = '".$dat['idProducto']."'");
            foreach ($detallesOferta as $detOfertas) {
                array_push($descuentos,$detOfertas['descuento']);
            }
            if(sizeof($descuentos)<$numProductos){
                array_push($descuentos,0);
            }
        }
        $this -> set ('descuentos', $descuentos);
         
        $datos2 = TableRegistry::get('productos')->find('all');
        $this -> set ('datos2', $datos2);
        
        //Botones de borrar y actualizar producto del carrito
        $DatosBoton = TableRegistry::get('wish_list_productos')->newEntity();
        
        if($this->request->is('post')) {
            $DatosBoton = TableRegistry::get('carrito_compras')->patchEntity($DatosBoton, $this->request->data);
            $LlavePrimaria = array($DatosBoton['idPersona'],$DatosBoton['idProducto']);
            
            if (isset($this->request->data['BotonActualizarCarrito'])) {
                $TuplaActualizar = TableRegistry::get('carrito_compras')-> get ($LlavePrimaria);
                $TuplaActualizar->set('cantidad', $DatosBoton['cantidad']);
                
                 if(TableRegistry::get('carrito_compras')->save($TuplaActualizar)) {
                    $this->Flash->success('La cantidad del producto ha sido actualizada.');
                    return $this->redirect(['action' => '../carrito/'.$codigo]);
                }
                else {
                    $this->Flash->error('El producto no se ha actualizado debido a un error.');
                }
                
            } else if (isset($this->request->data['BotonBorrar'])) {
                $TuplaBorrar = TableRegistry::get('carrito_compras')-> get ($LlavePrimaria);

                if(TableRegistry::get('carrito_compras')->delete($TuplaBorrar)) {
                    $this->Flash->success('Producto borrado del carrito de compras.');
                    return $this->redirect(['action' => '../carrito/'.$codigo]);
                }
                else {
                    $this->Flash->error('El producto no se ha borrado debido a un error.');
                }
                
            }
            
        }

        $this->set(compact('DatosBoton'));
        
        //Ejemplo: http://psychopatonan-jjjaguar.c9users.io/carrito/Heber74

    }
    /**
    * funcion wishlist
    * @param string $codigo producto.codigo
    * funcion para agregar producto a la wishlist y mostrar la wishlist al usuario
    * si recibe un parametro (id del producto) lo agrega a la tabla wishlist junto al id del usuario
    */
    public function wishlist($codigo = null) {
        if ($codigo==null) {
            $codigo = $this->request->session()->read('Auth.User.username');
        }
        
        $datos = TableRegistry::get('wish_list_productos')->find('all')->where("identificacionPersona = '".$codigo."'");
        $this -> set ('datos', $datos);
        
        $oferta = TableRegistry::get('ofertas');
        
        $descuentos=[];
        $numProductos=0;
        foreach ($datos as $dat) {
            $numProductos++;
            $detallesOferta = $oferta->find('all')->where("idProducto = '".$dat['idProducto']."'");
            foreach ($detallesOferta as $detOfertas) {
                array_push($descuentos,$detOfertas['descuento']);
            }
            if(sizeof($descuentos)<$numProductos){
                array_push($descuentos,0);
            }
        }
        $this -> set ('descuentos', $descuentos);
        
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
        
        $DatosTarjetas = TableRegistry::get('tarjetas')->find('all')->where("idPersona = '".$codigo."'")->toArray();
        $this -> set ('DatosTarjetas', $DatosTarjetas);
        
        $DatosDirecciones = TableRegistry::get('personas_direcciones')->find('all')->where("idPersona = '".$codigo."'");
        $this -> set ('DatosDirecciones', $DatosDirecciones);
        
        $DatosCarrito = TableRegistry::get('carrito_compras')->find('all')->where("idPersona = '".$codigo."'");
        $this -> set ('DatosCarrito', $DatosCarrito);
        
        $oferta = TableRegistry::get('ofertas');
        
        $descuentos=[];
        $numProductos=0;
        foreach ($DatosCarrito as $dat) {
            $numProductos++;
            $detallesOferta = $oferta->find('all')->where("idProducto = '".$dat['idProducto']."'");
            foreach ($detallesOferta as $detOfertas) {
                array_push($descuentos,$detOfertas['descuento']);
            }
            if(sizeof($descuentos)<$numProductos){
                array_push($descuentos,0);
            }
        }
        
        $DatosProductos = TableRegistry::get('productos')->find('all');
        $this -> set ('DatosProductos', $DatosProductos);
        
        //Botón de completar compra
        $addfactura = TableRegistry::get('facturas')->newEntity();

        if($this->request->is('post')) {
            $datos   = $this -> request -> data();
            $tarjeta = $DatosTarjetas [$datos ['Tarjetas']];
            $http    = new Client();
            $response = $http->get('https://psycho-webservice.herokuapp.com',
                [ 'numTarjeta' => $tarjeta ['idTarjeta']
                , 'csv'        => $tarjeta ['csv']
                , 'precio'     => $datos   ['precioTotal']])->body;
            if ($response == 'Rechazado: Fondos insuficientes.') {
				$this -> Flash -> Error ('Rechazado por fondos insuficientes');
				return;
			}
            $addfactura = TableRegistry::get('facturas')->patchEntity($addfactura, $this->request->data);
            
            if(TableRegistry::get('facturas')->save($addfactura)) {
                
                //Agregar los productos a la tabla productos_facturas
                $ProductosFactura = $this->request->data('idProducto');
                $CantidadesFactura = $this->request->data('cantidad');
                debug($this->request->data);
                
                for ($i=0; $i<Count($ProductosFactura); $i++) {
                    $data = [
                        'idFactura'  => $this->request->data('idFactura'),
                        'idProducto' => $ProductosFactura[$i],
                        'cantidad'   => $CantidadesFactura[$i]
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
                $this->Flash->error('La orden no se ha completado debido a un error.');
            }

        }
        
        $this->set(compact('addfactura'));
    }
   
        /**
     * funcion ofertas
     * fucion para mostrar las ofertas
     * se obtinen las ofertas de la base de datos
     * se extrae de la base los datos de las tablas productos y ofertas
     * se envia la informacion obtenida a la vista
     * 
     *
     */
    public function ofertas($codigo = null) {
        if ($codigo==null) {
            $codigo = "ofertas";
        }
        
        $this -> set ('TipoVista', $codigo);
        $this->set(compact('TipoVista'));
        
        $numPage = 1;
        $nuevaPag = $this -> request -> query('nuevaPag');
        
        $numPage2 = 1;
        $nuevaPag2 = $this -> request -> query('nuevaPag2');
        
        if ($nuevaPag && $nuevaPag > 0) {
            $numPage = $nuevaPag;
        }
        
        $ofertas = $this -> Productos -> find ('all', 
            ['conditions'=>['ofertas.idProducto = Productos.idProducto'],
            'contain' => ['ofertas']]);
        $ofertas = $ofertas -> limit(16) -> page ($numPage);
        $this -> set ('numPage', $numPage);
        $this->set('ofertas', $ofertas);
            
        $combos = TableRegistry::get('combos');
        $query = $combos->query();    
        $query = $query -> limit(16) -> page ($numPage2);
        $this -> set ('numPage2', $numPage2);
        $this->set('combos', $query);
        
    }
    
    public function nuevocombo() {
        $this->render();
        
    }
    
     /** 
     funcion para mostrar la ventana de administracion de productos
    * llama la vista  adminUsuarion
    * se busca en la base de datos la informacion de los productos (tablas preoductos, video_juegos, generos)
    * se envia como parametros los datos de cada usuario (nombre, identificacion, etc)
    */
    public function AdminProductos() {
        if ($this->request->session()->read('Auth.User.role')!='admin') {
            $this->redirect('../../');
        }
        $generosTabla  = TableRegistry::get ('generos');
        $videoJuegosT  = TableRegistry::get ('video_juegos');
        $consolasTabla = TableRegistry::get ('consolas');
        $combosTabla   = TableRegistry::get ('combos');
        $ofertasTabla  = TableRegistry::get ('ofertas');
        $productos     = $this -> Productos;
        $combos = $combosTabla -> find ('all');
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
                if ($datos ['Categoria'] == 1
                    || $datos ['Categoria'] == 2) { // Es videojuego.
                    $porInsertar = $videoJuegosT -> get ($datos['id']);
                    $porInsertar ['idConsola'] = $datos ['Plataforma'];
                    $porInsertar ['genero']    = $datos ['Genero'];
                    if (!$videoJuegosT -> save ($porInsertar))
                        $exitoso = false;
                }
                if ($datos ['descuento'] != '0') {
                    $porInsertar = $ofertasTabla -> newEntity ();
                    $porInsertar ['idProducto'] = $datos ['id'];
                    $porInsertar ['descuento' ] = $datos ['descuento'];
                    if (!$ofertasTabla -> save ($porInsertar))
                        $exitoso = false;
                } else {
                    // Hay que borrar el descuento si ya existe uno.
                    $porBorrar = $ofertasTabla
                        -> find  ('all') 
                        -> where ("idProducto ='".$datos['id']."'")
                        -> first ();
                    if ($porBorrar) {
                        $ofertasTabla -> delete ($porBorrar);
                    }
                }
                /*
                if ($datos ['combo'] == 'nuevo') {
                    $porInsertar = $combosTabla -> newEntity ();
                    $porInsertar ['idCombo']     = count ($combos);
                    $porInsertar ['precioCombo'] = $datos ['precioCombo'];
                    if (!$combosTabla -> save($porInsertar))
                        $exitoso = false;
                }*/

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
        
        $query = $productos
            -> find('all')
            -> contain (['video_juegos', 'ofertas']);
        
        $this -> set ('productos', $query);
        $this -> set ('combos', $combos);
        $this -> set ('generos', $generosTabla -> find ('all'));
        $this -> set ('consola', $consolasTabla -> find ('all')
            -> contain ('productos'));
    }

    
    //Controlador del error 404
    public function error404() {
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
    public function nuevoproducto(){
        if ($this->request->session()->read('Auth.User.role')!='admin') {
            $this->redirect('../../');
        }
        //se recuperan las consolas disponibles en la base de datos
        $nuevoProd = $this -> Productos-> newEntity ();
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
        
        $generos=TableRegistry::get('generos');
        $generos2=$generos->find('all', array(
            'fields' => array('generos.genero')));
         
        $generoArray = [];    
        foreach ($generos2 as $con) {
          array_push($generoArray, $con['genero']);
        }
        
        $this -> set ('opcionesGenero', $generoArray);
         
        
        
        if ($this-> request->is('post')) {
            
            
           $datos = $this -> request -> data;
           
           $nombre=$consolaArray[$datos ['consola']];
           
           
           $nombre2=$generoArray[$datos ['genero']];
          
           $generos3=$generos->find('all')
            ->where(['genero =' => $nombre2])
            ->first();
           $productos=$this->Productos->find('all')
            ->where(['nombreProducto =' => $nombre])
            ->where(['tipo =' => 3])
            ->first();
        
            $nuevoProd -> idProducto     = $datos ['identificador'];
            $nuevoProd -> nombreProducto = $datos ['nombreProducto'];
            $nuevoProd -> descripcion    = $datos ['descripcion'];
            $nuevoProd -> precio         = $datos ['precio'];
            $nuevoProd -> fabricante     = $datos ['fabricante'];
            $nuevoProd -> tipo           = $datos ['tipo'];
    
            $vid = $datos ['tipo'] > 0;
            //se guarda el producto en la base de datos
            if (TableRegistry::get('Productos') -> save ($nuevoProd)) {
                if ($datos ['tipo']==1||$datos ['tipo']==2) {
                    // Hay que insertar los datos en videojuego.
                    $videoJ = TableRegistry::get ('video_juegos') -> newEntity ();
                    $videoJ -> idVideoJuego = $datos ['identificador'];
                    $videoJ -> idConsola = $productos->idProducto ;
                    $videoJ -> ESRB = 4;
                    $videoJ -> reqMin = 'OpenGL 1';
                    $videoJ -> reqMax = 'Ninguno';
                    $videoJ -> genero = $generos3->genero;
                    TableRegistry::get ('video_juegos') -> save ($videoJ);
                } else if($datos ['tipo']==3) {
                    
                    $plat = TableRegistry::get ('consolas') -> newEntity ();
                    $plat -> idConsola = $datos ['identificador'];
                    $plat -> existencia = 200;
                    $plat -> especificaciones = $datos ['descripcion'];
                    TableRegistry::get ('consolas') -> save ($plat);
                    
                    
                }
                //se imprime un mensaje informando que se realizo el insert de forma exitosa
                $this -> Flash -> success ('Insertado correctamente');
            } else {
                //si falla el insert se imprime un mensaje de error
                $this -> Flash -> error ('Error insertando.');
            } 
        }
    }
        
        //$this -> render();
    
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
