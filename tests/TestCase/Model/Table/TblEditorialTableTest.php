<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblEditorialTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblEditorialTable Test Case
 */
class TblEditorialTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TblEditorialTable
     */
    protected $TblEditorial;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TblEditorial',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TblEditorial') ? [] : ['className' => TblEditorialTable::class];
        $this->TblEditorial = $this->getTableLocator()->get('TblEditorial', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TblEditorial);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
