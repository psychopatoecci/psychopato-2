<?php
use Migrations\AbstractMigration;

class CreatePersonasDireccion extends AbstractMigration
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
        $table = $this->table('personas_direcciones', [ 
            'id' => false,
            'primary_key' => [
                'nombreProvincia',
                'nombreCanton',
                'nombreDistrito',
                'idPersona',
                'detalles' ] ] );
        $table -> addColumn (
            'nombreProvincia',
            'string',
            [ 'default' => null, 'limit' => 60, 'null' => false ]
        );
        $table -> addColumn (
            'nombreCanton',
            'string',
            [ 'default' => null, 'limit' => 60, 'null' => false ]
        );
        $table -> addColumn (
            'nombreDistrito',
            'string',
            [ 'default' => null, 'limit' => 60, 'null' => false ]
        );
        $table -> addColumn (
            'idPersona',
            'string',
            [ 'default' => null, 'limit' => 50, 'null' => false ]
        );
        $table -> addColumn (
            'detalles',
            'string',
            [ 'default' => null, 'limit' => 256, 'null' => false ]
        );
        $table -> addForeignKey (
            [ 'nombreProvincia', 'nombreCanton', 'nombreDistrito' ],
            'distritos',
            [ 'nombreProvincia', 'nombreCanton', 'nombreDistrito' ],
            [ 'delete' => 'CASCADE', 'update' => 'CASCADE']
        );
        /*
        $table -> addForeignKey (
            'nombreCanton',
            'distritos',
            'nombreCanton',
            [ 'delete' => 'CASCADE', 'update' => 'CASCADE']
        );
        $table -> addForeignKey (
            'nombreDistrito',
            'distritos',
            'nombreDistrito',
            [ 'delete' => 'CASCADE', 'update' => 'CASCADE']
        );*/
        $table -> addForeignKey (
            'idPersona',
            'personas',
            'identificacion',
            [ 'delete' => 'CASCADE', 'update' => 'CASCADE']
        );
        $table->create();
    }
}
