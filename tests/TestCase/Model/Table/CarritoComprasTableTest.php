<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarritoComprasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarritoComprasTable Test Case
 */
class CarritoComprasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CarritoComprasTable
     */
    public $CarritoCompras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.carrito_compras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CarritoCompras') ? [] : ['className' => 'App\Model\Table\CarritoComprasTable'];
        $this->CarritoCompras = TableRegistry::get('CarritoCompras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CarritoCompras);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
