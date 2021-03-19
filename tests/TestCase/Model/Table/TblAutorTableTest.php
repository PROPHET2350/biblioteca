<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblAutorTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblAutorTable Test Case
 */
class TblAutorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TblAutorTable
     */
    protected $TblAutor;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TblAutor',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TblAutor') ? [] : ['className' => TblAutorTable::class];
        $this->TblAutor = $this->getTableLocator()->get('TblAutor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TblAutor);

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
