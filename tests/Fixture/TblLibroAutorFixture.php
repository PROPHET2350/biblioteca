<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TblLibroAutorFixture
 */
class TblLibroAutorFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tbl_libro_autor';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_libro' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_autor' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_libro' => ['type' => 'index', 'columns' => ['id_libro'], 'length' => []],
            'id_autor' => ['type' => 'index', 'columns' => ['id_autor'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'tbl_libro_autor_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_autor'], 'references' => ['tbl_autor', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tbl_libro_autor_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_libro'], 'references' => ['tbl_libros', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'id_autor' => 1,
            ],
        ];
        parent::init();
    }
}
