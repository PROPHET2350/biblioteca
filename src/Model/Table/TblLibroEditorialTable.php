<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TblLibroEditorial Model
 *
 * @method \App\Model\Entity\TblLibroEditorial newEmptyEntity()
 * @method \App\Model\Entity\TblLibroEditorial newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TblLibroEditorial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TblLibroEditorial get($primaryKey, $options = [])
 * @method \App\Model\Entity\TblLibroEditorial findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TblLibroEditorial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TblLibroEditorial[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TblLibroEditorial|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblLibroEditorial saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblLibroEditorial[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblLibroEditorial[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblLibroEditorial[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblLibroEditorial[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TblLibroEditorialTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tbl_libro_editorial');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('TblLibros',[
            'foreignKey'=>'id_libro',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('id_libro')
            ->requirePresence('id_libro', 'create')
            ->notEmptyString('id_libro');

        $validator
            ->integer('id_editorial')
            ->requirePresence('id_editorial', 'create')
            ->notEmptyString('id_editorial');

        return $validator;
    }
}
