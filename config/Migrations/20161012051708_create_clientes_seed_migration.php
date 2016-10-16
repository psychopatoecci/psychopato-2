<?php

use Phinx\Migration\AbstractMigration;

class CreateClientesSeedMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);
        $rows = $this->fetchAll('SELECT identificacion FROM personas');
        $contador=0;
        foreach($rows as $var){
            $idPer[$contador] = $var[0];
            $contador++;
        }
        for ($i = 1; $i <= 100; $i++) {
            $populator->addEntity('clientes', 1, [
                'identificacion' => $faker->unique()->randomElement($array = $idPer)
            ]);
            $populator->execute();
        }
    }
}
