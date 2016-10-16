<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DistritosFixture
 *
 */
class DistritosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'codDistrito' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'codCanton' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'codProvincia' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nombreDistrito' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'codCanton' => ['type' => 'index', 'columns' => ['codCanton'], 'length' => []],
            'codProvincia' => ['type' => 'index', 'columns' => ['codProvincia'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['codDistrito', 'codCanton', 'codProvincia'], 'length' => []],
            'distritos_ibfk_1' => ['type' => 'foreign', 'columns' => ['codCanton'], 'references' => ['cantones', 'codCanton'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'distritos_ibfk_2' => ['type' => 'foreign', 'columns' => ['codProvincia'], 'references' => ['provincias', 'codProvincia'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
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
            'codDistrito' => 1,
            'codCanton' => 1,
            'codProvincia' => 1,
            'nombreDistrito' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
