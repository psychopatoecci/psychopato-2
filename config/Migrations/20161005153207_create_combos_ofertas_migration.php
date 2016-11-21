<?php

use Phinx\Migration\AbstractMigration;

class CreateCombosOfertasMigration extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('productos_combos', ['id' => false, 'primary_key' => ['idCombo', 'idProducto']]);
        $table->addColumn('idCombo', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idCombo', 'combos', 'idCombo', array('delete' => 'CASCADE', 'update' => 'CASCADE'));
        
        $table->addColumn('idProducto', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idProducto', 'productos', 'idProducto', array('delete' => 'CASCADE', 'update' => 'CASCADE'));
        $table->create();
    }
}
