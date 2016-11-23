<?php
use Migrations\AbstractMigration;

class CreateOfertasMigration extends AbstractMigration
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
        $table = $this->table('ofertas',  ['id' => false, 'primary_key' => ['idProducto']]);
        $table->addColumn('idProducto', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idProducto', 'productos', 'idProducto', array('delete' => 'CASCADE', 'update' => 'CASCADE'));
        $table->addColumn('descuento', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
