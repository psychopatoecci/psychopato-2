<?php
use Migrations\AbstractSeed;

/**
 * ARFacturas seed.
 */
class ARFacturasSeed extends AbstractSeed
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
        $faker = Faker\Factory::create();
        $rows = $this->fetchAll('SELECT identificacion FROM personas');
        $data = [];
        foreach ($rows as $arr) {
            $id=strval($arr[0]);
            $data = [
                'idFactura' => "FAC".$faker->unique()->numberBetween($min = 2000, $max = 600000),
                'fechaFactura' => $faker->date($format = 'Y-m-d', $max = '2010-01-01'),
                'idUsuario' => $id,
                'precioTotal' => $faker->numberBetween($min = 10000, $max = 956325415),
                'estadoCompra' => $faker->numberBetween($min = 1, $max = 3),
                
            ];
            //$populator->execute();
        $table = $this->table('facturas');
        $table->insert($data)->save();
        }
        
    }
}
