<?php

use Phinx\Migration\AbstractMigration;

class CreateComponentesConsolaSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);
        $rows = $this->fetchAll('SELECT idComponente FROM componentes');
        $contador=0;
        foreach($rows as $var){
            $idComp[$contador] = $var[0];
            $contador++;
        }
        $rows2 = $this->fetchAll('SELECT idConsola FROM consolas');
        foreach ($rows2 as $arr) {
            $id=$arr[0];
            $num=rand(1, 4);
            for ($i = 1; $i <= $num; $i++) {
                $populator->addEntity('componente_consolas', 1, [
                    'idComponente' => $faker->randomElement($array = $idComp),
                    'idConsola' => $id
                ]);
                $populator->execute();
            }
        }
    }
}
