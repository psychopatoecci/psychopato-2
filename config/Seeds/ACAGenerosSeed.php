<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class ACAGenerosSeed extends AbstractSeed
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
        $generos = ['accion', 'aventura', 'plataforma', 'rpg', 'shooter'];
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);
        $data = [];
        for ($i = 0; $i < count($generos); $i++) {
            $id=strval($i);
            $data = [
                'genero' => $generos[$i]
            ];
            $table = $this -> table ('generos');
            $table -> insert ($data) -> save ();
        }
        
    }
}
