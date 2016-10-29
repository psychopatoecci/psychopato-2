<?php
use Migrations\AbstractMigration;

class CreateVideoJuegos extends AbstractMigration
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
        $table = $this->table('video_juegos', ['id' => false, 'primary_key' => ['idVideoJuego']]);
        $table->addColumn('idVideoJuego', 'string', [
            /*'identity' => true, 
            'signed' => false,*/
            'default' => null,
            'limit'   => 50,
            'null'    => false,
        ]);
        $table->addForeignKey('idVideoJuego', 'productos', 
            'idProducto',
            array('delete' => 'CASCADE', 'update' => 'CASCADE')
        );

        $table->addColumn('idConsola', 'string', [
            'default' => null,
            'limit'   => 50,
            'null'    => false
        ]);
        
        $table->addForeignKey('idConsola', 'productos', 'idProducto' );

        $table->addColumn('ESRB', 'string', [
            'default' => null,
            'limit'   => 255,
            'null'    => false,
        ]);
        $table->addColumn('reqMin', 'text', [
            'default' => null,
            'null'    => false,
        ]);
        $table->addColumn('reqMax', 'text', [
            'default' => null,
            'null'    => false,
        ]);
        $table->addColumn('genero', 'string', [
            'default' => null,
            'limit'   => 50
        ]);
        $table->create();
    }
}
