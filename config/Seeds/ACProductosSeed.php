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
        for ($i = 0; $i < 200; $i++)
        {
            $data[] = [
                'idProducto' => "PROD".$faker->unique()->numberBetween($min = 1000, $max = 500000),
                'nombreProducto'  => $faker->word,
                'tipo'   => $faker->numberBetween($min = 1, $max = 3),
                'imagen' => $faker->imageUrl($width = 640, $height = 480, 'technics'),
                'precio'      => $faker->numberBetween($min = 1000, $max = 500000),
                'fabricante'   => $faker->company
            ];
        }
        $table = $this->table('productos');
        $table->insert($data)->save();
        
    }
}
