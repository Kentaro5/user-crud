<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SexsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SexsTable Test Case
 */
class SexsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SexsTable
     */
    public $Sexs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sexs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Sexs') ? [] : ['className' => SexsTable::class];
        $this->Sexs = TableRegistry::getTableLocator()->get('Sexs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sexs);

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
