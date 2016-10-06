<?php

use Phinx\Migration\AbstractMigration;

class CreateCombosMigration extends AbstractMigration
{
        public function change()
    {
        $table = $this->table('combos',  ['id' => false, 'primary_key' => ['idCombo']]);
        $table->addColumn('idCombo', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('fechaInicio', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
         $table->addColumn('fechaFin', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('precioCombo', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
