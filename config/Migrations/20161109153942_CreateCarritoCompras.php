<?php
use Migrations\AbstractMigration;

class CreateCarritoCompras extends AbstractMigration
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
        $table = $this -> table ( 'carrito_compras', [
            'id' => false,
            'primary_key' => [ 'idProducto' ] ] );
            
                $table -> addColumn (
            'idPersona',
            'string',
            [ 'default' => null, 'limit' => 50, 'null' => false ]
        );
        $table -> addForeignKey (
            'idPersona',
            'personas',
            'identificacion',
            [ 'delete' => 'CASCADE', 'update' => 'CASCADE' ]
        );
        
        
        $table -> addColumn (
            'idProducto',
            'string',
            [ 'default' => null, 'limit' => 50, 'null' => false ]
        );
        $table -> addForeignKey (
            'idProducto',
            'productos',
            'idProducto',
            [ 'delete' => 'CASCADE', 'update' => 'CASCADE' ]
        );    


           


        $table -> addColumn (
            'cantidad',
            'integer',
            [ 'default' => null, 'limit' => 11, 'null' => false ]
        );

        $table -> create ();
    }
}
