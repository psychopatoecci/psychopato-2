<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class AEGenerosSeed extends AbstractSeed
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
        $rows = $this->fetchAll('SELECT idVideoJuego FROM video_juegos');
        $data = [];
        foreach ($rows as $arr) {
            $id=strval($arr[0]);
            $data = [
                'idVideoJuego' => $id,
                'genero' => $faker->sentence($nbWords = 2, $variableNbWords = true)
            ];
            $table = $this -> table ('generos');
            $table -> insert ($data) -> save ();
        }
        
    }
}
