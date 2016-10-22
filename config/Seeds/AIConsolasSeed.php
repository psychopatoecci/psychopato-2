<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class AIConsolasSeed extends AbstractSeed
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
        $rows = $this->fetchAll('SELECT idProducto FROM productos WHERE tipo = 3');
        $data = [];
        foreach ($rows as $arr) {
            $id=strval($arr[0]);
            $data = [
                'idConsola' => $id,
                'existencia' => $faker-> numberBetween ($min = 0, $max = 254),
                'especificaciones' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
            ];
            $table = $this -> table ('consolas');
            $table -> insert ($data) -> save ();
        }
        
    }
}
