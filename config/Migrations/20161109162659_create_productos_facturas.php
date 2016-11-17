<?php

use Phinx\Migration\AbstractMigration;

class CreateProductosFacturas extends AbstractMigration
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
         $table = $this->table('productos_facturas',  ['id' => false, 'primary_key' => ['idFactura', 'idProducto']]);
        $table->addColumn('idFactura', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idFactura', 'facturas', 
            'idFactura',
            array('delete' => 'NO ACTION', 'update' => 'CASCADE')
        );
        $table->addColumn('idProducto', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idProducto', 'productos', 
            'idProducto',
            array('delete' => 'NO ACTION', 'update' => 'CASCADE')
        );
        $table->addColumn('cantidad', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
         $table->create();
    }
}
