<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TelefonosPersonasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TelefonosPersonasTable Test Case
 */
class TelefonosPersonasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TelefonosPersonasTable
     */
    public $TelefonosPersonas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.telefonos_personas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TelefonosPersonas') ? [] : ['className' => 'App\Model\Table\TelefonosPersonasTable'];
        $this->TelefonosPersonas = TableRegistry::get('TelefonosPersonas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TelefonosPersonas);

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
