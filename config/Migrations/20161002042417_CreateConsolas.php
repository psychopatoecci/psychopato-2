<?php
use Migrations\AbstractMigration;

class CreateConsolas extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('consolas',  ['id' => false, 'primary_key' => ['idConsola']]);
        $table->addColumn('idConsola', 'string', [
            /*'identity' => true, 
            'signed' => false,*/
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idConsola', 'productos', 'idProducto', array('delete' => 'CASCADE', 'update' => 'CASCADE'));
        
        $table->addColumn('existencia', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('especificaciones', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
        
       /* $refTable = $this->table('consolas');
        $refTable->addColumn('id_producto', 'string')
                 ->addForeignKey('id_producto', 'productos', 'idProducto', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
                 ->update();*/
    }
}
