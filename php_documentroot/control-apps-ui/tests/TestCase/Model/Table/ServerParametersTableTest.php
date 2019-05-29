<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServerParametersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServerParametersTable Test Case
 */
class ServerParametersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServerParametersTable
     */
    public $ServerParameters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ServerParameters',
        'app.Servers',
        'app.Applications',
        'app.ParameterTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ServerParameters') ? [] : ['className' => ServerParametersTable::class];
        $this->ServerParameters = TableRegistry::getTableLocator()->get('ServerParameters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ServerParameters);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
