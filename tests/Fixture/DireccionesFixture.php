<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DireccionesFixture
 *
 */
class DireccionesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'identificacion' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo_dir' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'cod_provincia' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cod_canton' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cod_distrito' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'detalles' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'cod_provincia' => ['type' => 'index', 'columns' => ['cod_provincia'], 'length' => []],
            'cod_canton' => ['type' => 'index', 'columns' => ['cod_canton'], 'length' => []],
            'cod_distrito' => ['type' => 'index', 'columns' => ['cod_distrito'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['identificacion', 'tipo_dir'], 'length' => []],
            'direcciones_ibfk_1' => ['type' => 'foreign', 'columns' => ['identificacion'], 'references' => ['personas', 'identificacion'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'direcciones_ibfk_2' => ['type' => 'foreign', 'columns' => ['cod_provincia'], 'references' => ['provincias', 'codProvincia'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'direcciones_ibfk_3' => ['type' => 'foreign', 'columns' => ['cod_canton'], 'references' => ['cantones', 'codCanton'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'direcciones_ibfk_4' => ['type' => 'foreign', 'columns' => ['cod_distrito'], 'references' => ['distritos', 'codDistrito'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'identificacion' => '8dd6e68b-a9e4-455e-b1a4-f587b08d7789',
            'tipo_dir' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'cod_provincia' => 1,
            'cod_canton' => 1,
            'cod_distrito' => 1,
            'detalles' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
