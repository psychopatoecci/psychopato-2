<?php
use Migrations\AbstractMigration;

class CreateVideoJuegoDigital extends AbstractMigration
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
        $table = $this->table('video_juego_digitals', ['id' => false, 'primary_key' => ['idVideoJuegoDigital']]);
        $table->addColumn('idVideoJuegoDigital', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idVideoJuegoDigital', 'video_juegos', 'idVideoJuego', array('delete' => 'CASCADE', 'update' => 'CASCADE'));
        
        $table->addColumn('tamano', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('formatoDescarga', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->create();
    }
}
