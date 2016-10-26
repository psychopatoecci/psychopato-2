<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class AHVideoJuegoFisicosSeed extends AbstractSeed
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
        $rows = $this->fetchAll('SELECT idProducto FROM productos WHERE tipo = 2');
        $data = [];
        foreach ($rows as $arr) {
            $id=strval($arr[0]);
            $data = [
                'idVideoJuegoFisico' => $id,
                'existencia' => $faker-> numberBetween ($min = 0, $max = 254)
            ];
            $table = $this -> table ('video_juego_fisicos');
            $table -> insert ($data) -> save ();
        }
        
    }
}
