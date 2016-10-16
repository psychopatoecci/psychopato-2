<?php
use Migrations\AbstractMigration;

class CreateClientesMigration extends AbstractMigration
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
         $table = $this->table('clientes', ['id' => false, 'primary_key' => ['identificacion']]);
        $table->addColumn('identificacion', 'string', [
            'null' => false,
        ]);
        
        $table->create();
    }
}
