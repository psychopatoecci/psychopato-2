<?php
use Migrations\AbstractMigration;

class AddcsvTotarjetas extends AbstractMigration
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
        $table = $this->table('tarjetas');
        $table -> addColumn ('csv', 'integer', [
			'limit' => '3', 'null' => false]);
        $table->update();
    }
}
