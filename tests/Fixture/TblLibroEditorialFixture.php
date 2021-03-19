<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TblLibroEditorialFixture
 */
class TblLibroEditorialFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tbl_libro_editorial';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_libro' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_editorial' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_editorial' => ['type' => 'index', 'columns' => ['id_editorial'], 'length' => []],
            'id_libro' => ['type' => 'index', 'columns' => ['id_libro'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'tbl_libro_editorial_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_editorial'], 'references' => ['tbl_editorial', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tbl_libro_editorial_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_libro'], 'references' => ['tbl_libros', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'id_libro' => 1,
                'id_editorial' => 1,
            ],
        ];
        parent::init();
    }
}
