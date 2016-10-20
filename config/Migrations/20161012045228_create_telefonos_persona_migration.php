<?php

use Phinx\Migration\AbstractMigration;

class CreateTelefonosPersonaMigration extends AbstractMigration
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
        $table = $this->table('telefonos_personas',  ['id' => false, 'primary_key' => ['identificacion']]);
        $table->addColumn('identificacion', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('identificacion', 'personas', 'identificacion', array('delete' => 'CASCADE', 'update' => 'CASCADE'));
        
        $table->addColumn('telefono', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->create();
    }
}
