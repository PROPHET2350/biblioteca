<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblLibroAutorTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblLibroAutorTable Test Case
 */
class TblLibroAutorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TblLibroAutorTable
     */
    protected $TblLibroAutor;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TblLibroAutor',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TblLibroAutor') ? [] : ['className' => TblLibroAutorTable::class];
        $this->TblLibroAutor = $this->getTableLocator()->get('TblLibroAutor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TblLibroAutor);

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
