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
        $rows = $this->fetchAll('SELECT idFactura FROM facturas');
        $rows2 = $this->fetchAll('SELECT idProducto FROM productos');
        $contador = 0;
        foreach($rows as $var){
            $idFact[$contador] = $var[0];
            $contador++;
        }
        $contador = 0;
        foreach($rows2 as $var){
            $idProd[$contador] = $var[0];
            $contador++;
        }
       
  
        for ($i = 0; $i <count($rows); $i++)
        {
            $num = rand (1, 4);
            for ($e = 1; $e <= $num; $e++ ) {
            $data = [
                'idFactura'  => $faker->randomElement($array = $idFact),
                'idProducto' => $faker->randomElement($array = $idProd),
                'cantidad' => $faker->numberBetween($min = 1, $max = 20)
            ];
            }
        
            $table = $this->table('productos_facturas');
            $table->insert($data)->save();
        }
    }
}
