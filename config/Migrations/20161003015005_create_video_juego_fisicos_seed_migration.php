<?php

use Phinx\Migration\AbstractMigration;

class CreateVideoJuegoFisicosSeedMigration extends AbstractMigration
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
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);
        $rows = $this->fetchAll('SELECT idProducto FROM productos WHERE tipo = 2');
        foreach ($rows as $arr) {
            $id=$arr[0];
            $populator->addEntity('video_juego_fisicos', 1, [
                'idVideoJuegoFisico' => $id,
                'existencia' => function () use ($faker) {
                    return $faker->numberBetween($min = 1, $max = 1000);
                }
            ]);
            $populator->execute();
        }
    }
}
