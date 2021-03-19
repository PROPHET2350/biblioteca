<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblLibrosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblLibrosTable Test Case
 */
class TblLibrosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TblLibrosTable
     */
    protected $TblLibros;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TblLibros',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TblLibros') ? [] : ['className' => TblLibrosTable::class];
        $this->TblLibros = $this->getTableLocator()->get('TblLibros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TblLibros);

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
