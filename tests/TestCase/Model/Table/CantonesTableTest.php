<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CantonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CantonesTable Test Case
 */
class CantonesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CantonesTable
     */
    public $Cantones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cantones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cantones') ? [] : ['className' => 'App\Model\Table\CantonesTable'];
        $this->Cantones = TableRegistry::get('Cantones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cantones);

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
