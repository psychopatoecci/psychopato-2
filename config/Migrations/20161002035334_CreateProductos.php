<?php
use Migrations\AbstractMigration;

class CreateProductos extends AbstractMigration
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
        $table = $this->table('productos',  ['id' => false, 'primary_key' => ['idProducto']]);
        $table->addColumn('idProducto', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('nombreProducto', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('tipo', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        //$table->addColumn('imagen', 'blob', [
        //    'default' => null,
        //    'null' => false,
        //]);
        $table->addColumn('precio', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('descripcion', 'text', [
            'default' => null
        ]);
        $table->addColumn('fabricante', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->create();
    }
}
