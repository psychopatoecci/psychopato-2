<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CarritoComprasFixture
 *
 */
class CarritoComprasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idCarrito' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idProducto' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'idPersona' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cantidad' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'idProducto' => ['type' => 'index', 'columns' => ['idProducto'], 'length' => []],
            'idPersona' => ['type' => 'index', 'columns' => ['idPersona'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idCarrito', 'idProducto'], 'length' => []],
            'carrito_compras_ibfk_1' => ['type' => 'foreign', 'columns' => ['idProducto'], 'references' => ['productos', 'idProducto'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'carrito_compras_ibfk_2' => ['type' => 'foreign', 'columns' => ['idPersona'], 'references' => ['personas', 'identificacion'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'idCarrito' => 1,
            'idProducto' => '5a690580-d1c4-47c7-8c5c-f629f4441019',
            'idPersona' => 'Lorem ipsum dolor sit amet',
            'cantidad' => 1
        ],
    ];
}
