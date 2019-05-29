<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfigTemplatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfigTemplatesTable Test Case
 */
class ConfigTemplatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfigTemplatesTable
     */
    public $ConfigTemplates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ConfigTemplates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ConfigTemplates') ? [] : ['className' => ConfigTemplatesTable::class];
        $this->ConfigTemplates = TableRegistry::getTableLocator()->get('ConfigTemplates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConfigTemplates);

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
