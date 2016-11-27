<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class ACProductosSeed extends AbstractSeed
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
        $consolas = array('ps4', 'ps3', 'one', '360', 'wii', 'wiiu', 'pc', 'vita', '3ds', 'ds');
        for ($i = 0; $i < 100; $i++)
        {
        $tipo = $faker->numberBetween($min = 1, $max = 2);
            $data[] = [
                'idProducto'      => "PROD".$faker->unique()->numberBetween($min = 1000, $max = 500000),
                'nombreProducto'  => $faker->word,
                'tipo'            => $tipo,
                'precio'          => $faker->numberBetween($min = 1000, $max = 500000),
                'descripcion'     => $faker->paragraph,
                'fabricante'      => $faker->company
            ];
        }
        foreach ($consolas as $consola) {
            $data[] = [
                'idProducto'     => "PROD".$faker->unique()->numberBetween($min = 1000, $max = 500000),
                'nombreProducto' => $consola,
                'tipo'           => 3,
                'precio'         => $faker->numberBetween($min = 1000, $max = 500000),
                'descripcion'    => $faker->paragraph,
                'fabricante'     => $faker->company   
            ];
        }
        $table = $this->table('productos');
        $table->insert($data)->save();
        
    }
}
