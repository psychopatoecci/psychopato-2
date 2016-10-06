<?php
use Migrations\AbstractMigration;

class CreateGenero extends AbstractMigration
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
        $table = $this->table('generos', ['id' => false, 'primary_key' => ['idVideoJuego']]);
        $table->addColumn('idVideoJuego', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idVideoJuego', 'video_juegos', 'idVideoJuego', array('delete' => 'CASCADE', 'update' => 'CASCADE'));
        
        $table->addColumn('genero', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}
