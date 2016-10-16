<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdministradoresMigrationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdministradoresMigrationsTable Test Case
 */
class AdministradoresMigrationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdministradoresMigrationsTable
     */
    public $AdministradoresMigrations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.administradores_migrations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AdministradoresMigrations') ? [] : ['className' => 'App\Model\Table\AdministradoresMigrationsTable'];
        $this->AdministradoresMigrations = TableRegistry::get('AdministradoresMigrations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdministradoresMigrations);

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
