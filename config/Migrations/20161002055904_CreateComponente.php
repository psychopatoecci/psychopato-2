<?php
use Migrations\AbstractMigration;

class CreateComponente extends AbstractMigration
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
        $table = $this->table('componentes', ['id' => false, 'primary_key' => ['idComponente']]);
        $table->addColumn('idComponente', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        
        $table->addColumn('descripcion', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('nombreComponente', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->create();
    }
}
