<?php
use Migrations\AbstractMigration;

class CreateComponenteConsola extends AbstractMigration
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
        $table = $this->table('componente_consolas', ['id' => false, 'primary_key' => ['idComponente', 'idConsola']]);
        $table->addColumn('idComponente', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idComponente', 'componentes', 'idComponente', array('delete' => 'NO_ACTION', 'update' => 'CASCADE'));
        
        $table->addColumn('idConsola', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idConsola', 'consolas', 'idConsola', array('delete' => 'NO_ACTION', 'update' => 'CASCADE'));
        $table->create();
    }
}
