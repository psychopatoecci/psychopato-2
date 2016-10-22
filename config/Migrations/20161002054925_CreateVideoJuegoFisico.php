<?php
use Migrations\AbstractMigration;

class CreateVideoJuegoFisico extends AbstractMigration
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
        $table = $this->table('video_juego_fisicos', ['id' => false, 'primary_key' => ['idVideoJuegoFisico']]);
        $table->addColumn('idVideoJuegoFisico', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addForeignKey('idVideoJuegoFisico', 'video_juegos', 'idVideoJuego', array('delete' => 'CASCADE', 'update' => 'CASCADE'));
        $table->addColumn('existencia', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
