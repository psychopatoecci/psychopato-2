<?php

use Phinx\Migration\AbstractMigration;

class CreateFacturas extends AbstractMigration
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
        $table = $this->table('facturas',  ['id' => false, 'primary_key' => ['idFactura']]);
        $table->addColumn('idFactura', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('fechaFactura', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('idUsuario', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idUsuario', 'personas', 
            'identificacion', array('delete' => 'NO_ACTION', 'update' => 'CASCADE')
        );
        $table->addColumn('precioTotal', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('estadoCompra', 'integer', [
            'default' => null,
            'limit' => 2,
            'null' => false,
        ]);
<<<<<<< HEAD
         $table->addColumn('direccionEnvio', 'string', [
=======
                 $table->addColumn('direccionEnvio', 'string', [
>>>>>>> 2979c5e3eb31c8de1c7c3f2e9b40bdf927da5726
            'default' => null,
            'limit' => 200,
            'null' => false,
        ]);
         $table->addColumn('formaPago', 'string', [
            'default' => null,
            'limit' => 16,
            'null' => false,
<<<<<<< HEAD
        ]); 
=======
        ]);
>>>>>>> 2979c5e3eb31c8de1c7c3f2e9b40bdf927da5726
        /*$table->addForeignKey('idUsuario', 'tarjetas', 'idPersona',
         array('delete' => 'NO_ACTION', 'update' => 'CASCADE')
        );*/
        $table->create();
    }
}
