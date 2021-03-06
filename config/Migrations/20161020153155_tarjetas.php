<?php

use Phinx\Migration\AbstractMigration;

class Tarjetas extends AbstractMigration
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
        $table = $this -> table ('tarjetas', ['id' => false, 'primaryKey' => [ 'idTarjeta', 'idPersona']]);
        $table -> addColumn ( 'idTarjeta', 'string', ['limit' => 16]);
        $table -> addColumn ( 'idPersona', 'string', ['limit' => 50
            , 'null' => false]);
        $table -> addForeignKey ('idPersona', 'personas', 'identificacion',
            ['delete' => 'CASCADE', 'update' => 'CASCADE']);
        $table -> create ();
    }
}
