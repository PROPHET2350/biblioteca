<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TblLibroEditorialTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TblLibroEditorialTable Test Case
 */
class TblLibroEditorialTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TblLibroEditorialTable
     */
    protected $TblLibroEditorial;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TblLibroEditorial',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TblLibroEditorial') ? [] : ['className' => TblLibroEditorialTable::class];
        $this->TblLibroEditorial = $this->getTableLocator()->get('TblLibroEditorial', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TblLibroEditorial);

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
