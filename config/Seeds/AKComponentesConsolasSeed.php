<?php
use Migrations\AbstractSeed;

/**
 * Telefonos seed.
 */
class AKComponentesConsolasSeed extends AbstractSeed
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

        $components = $this -> fetchAll ('SELECT idComponente FROM componentes');
        $contador=0;
        foreach ($components as $var) {
            $idComp [$contador] = $var[0];
            $contador ++;
        }
        $rows = $this->fetchAll('SELECT idConsola FROM consolas');
        $data = [];
        foreach ($rows as $arr) {
            $id=strval($arr[0]);
            $componentsNum = rand (1, 4);
            for ($i = 1; $i <= $componentsNum; $i++ ) {
                $data = [
                    'idConsola' => $id,
                    'idComponente' =>$faker->unique->randomElement($array = $idProd),
                ];
                $table = $this -> table ('componente_consolas');
                $table -> insert ($data) -> save ();
            }
        }
    }
}
