<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class ADVideoJuegosSeed extends AbstractSeed
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
        $rows = $this->fetchAll('SELECT idProducto FROM productos WHERE tipo <= 2');
        $data = [];
        foreach ($rows as $arr) {
            $id=strval($arr[0]);
            $data = [
                'idVideoJuego' => $id,
                'ESRB' => $faker->numberBetween($min = 1, $max = 7),
                'descripcion' => $faker->sentence($nbWords = 5, $variableNbWords = true),
                'reqMin' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'reqMax' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
            ];
            $table = $this -> table ('video_juegos');
            $table -> insert ($data) -> save ();
            //$populator->execute();
        }
        
    }
}
