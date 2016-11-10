<?php
use Migrations\AbstractSeed;

/**
 * ASCarritoCompras seed.
 */
class ASCarritoComprasSeed extends AbstractSeed
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
        $rows = $this->fetchAll('SELECT idProducto FROM productos');
        $rows2 = $this->fetchAll('SELECT identificacion FROM personas');
        $contador = 0;
        foreach($rows as $var){
            $idProd[$contador] = $var[0];
            $contador++;
        }
        $contador = 0;
        foreach($rows2 as $var){
            $idPer[$contador] = $var[0];
            $contador++;
        }
  
        for ($i = 0; $i < 50; $i++)
        {
            $data = [
                'idCarrito' => $faker->unique()->numberBetween($min = 101, $max = 999),
                'idProducto' => $faker->randomElement($array = $idProd),
                'idPersona' => $faker->randomElement($array = $idPer),
                'cantidad' => $faker->numberBetween($min = 1, $max = 100),
            ];
        
            $table = $this->table('carrito_compras');
            $table->insert($data)->save();
        }

    }
}
