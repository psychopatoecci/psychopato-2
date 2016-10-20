<?php
use Migrations\AbstractMigration;

class CreateAdministradoresMigration extends AbstractMigration
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
        $table = $this->table('administradores_migrations', ['id' => false, 'primary_key' => ['identificacion']]);
        $table->addColumn('identificacion', 'string', [
            'null' => false,
        ]);
        $table->addForeignKey('identificacion', 'personas', 'identificacion', array('delete' => 'NO_ACTION', 'update' => 'NO_ACTION'));
        $table->addColumn('salario', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        
        $table->create();
    
    }
}
