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
  
        for ($i = 0; $i < 50; $i++)
        {
            $data = [
                'idFactura' => $faker->randomElement($array = $idFact),
                'idProducto' => $faker->randomElement($array = $idProd),
                'precioTotal' => $faker->numberBetween($min = 10000, $max = 956325415),
                'cantidad' => $faker->numberBetween($min = 1, $max = 100),
            ];
        
            $table = $this->table('productos_facturas');
            $table->insert($data)->save();
        }
    }
}
