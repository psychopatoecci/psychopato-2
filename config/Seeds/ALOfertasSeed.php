<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class ALOfertasSeed extends AbstractSeed
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
        $data = [];
        $rows = $this->fetchAll('SELECT idProducto FROM productos');
        $contador=0;
        foreach($rows as $var){
            $idProd[$contador] = $var[0];
            $contador++;
        }
        for ($i = 0; $i < 50; $i++)
        {
            $data[] = [
                'idProducto' => $faker->unique->randomElement($array = $idProd),
                'fechaInicio'  => $faker->date($format = 'Y-m-d', $max = '2014-01-01'),
                'fechaFin'  => $faker->date($format = 'Y-m-d', $max = '2017-01-01'),
                'descuento' => $faker->numberBetween($min = 10000, $max = 100000)
            ];
        }
        $table = $this->table('ofertas');
        $table->insert($data)->save();
    }
}
