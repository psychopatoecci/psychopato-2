<?php
use Migrations\AbstractSeed;

/**
 * ATProductosFacturas seed.
 */
class ATProductosFacturasSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $faker = Faker\Factory::create();
        $facturas = $this->fetchAll('SELECT idFactura FROM facturas');
        $productos = $this->fetchAll('SELECT idProducto FROM productos');
        $contador = 0;
        foreach($facturas as $factura){
            $idFact[$contador] = $factura[0];
            $contador++;
        }
        $contador = 0;
        foreach($productos as $producto){
            $idProd[$contador] = $producto[0];
            $contador++;
        }
       
  
        for ($i = 0; $i <count($facturas); $i++)
        {
            // Se evitan duplicados.
            $idFactura = $idFact [$i];
            $idProductos = [];
            $num = rand (1, 4);
            for ($e = 1; $e <= $num; $e++) {
                array_push ($idProductos, $faker -> randomElement ($idProd));
            }
            $idProductos = array_unique ($idProductos);
            foreach ($idProductos as $idProducto) {
                $data [] = [
                    'idFactura'  => $idFactura,
                    'idProducto' => $idProducto,
                    'cantidad'   => $faker->numberBetween($min = 1, $max = 10)
                ];
            }
        }
        $table = $this->table('productos_facturas');
        $table->insert($data)->save();
    }
}
