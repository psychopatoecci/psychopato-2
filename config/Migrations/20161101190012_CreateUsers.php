<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users', ['id' => true]);
            //'primaryKey' => 'username']);
        $table -> addColumn ('username', 'string', [
            'null'  => false,
            'limit' => 50
        ]);
        $table->addForeignKey('username', 'personas', 'identificacion',
            array('delete' => 'CASCADE', 'update' => 'CASCADE'));
        $table -> addColumn ('password', 'string', [
            'null'  => false,
            'limit' => 255
        ]);
        $table -> addColumn ('role', 'string', [
            'null'  => false,
            'limit' => 20
        ]);
        $table->create();
    }
}
