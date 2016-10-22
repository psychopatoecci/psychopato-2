<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class AGVideoJuegoDigitalsSeed extends AbstractSeed
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
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);
        $rows = $this->fetchAll('SELECT idProducto FROM productos WHERE tipo = 1');
        $data = [];
        foreach ($rows as $arr) {
            $id=strval($arr[0]);
            $data = [
                'idVideoJuegoDigital' => $id,
                'tamano' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'formatoDescarga' => $faker->sentence($nbWords = 2, $variableNbWords = true)
            ];
            $table = $this -> table ('video_juego_digitals');
            $table -> insert ($data) -> save ();
        }
        
    }
}
