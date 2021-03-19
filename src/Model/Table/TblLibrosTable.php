<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TblLibros Model
 *
 * @method \App\Model\Entity\TblLibro newEmptyEntity()
 * @method \App\Model\Entity\TblLibro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TblLibro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TblLibro get($primaryKey, $options = [])
 * @method \App\Model\Entity\TblLibro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TblLibro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TblLibro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TblLibro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblLibro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblLibro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblLibro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblLibro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblLibro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TblLibrosTable extends Table
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

        $this->setTable('tbl_libros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('titulo')
            ->maxLength('titulo', 150)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->date('fecha_creacion')
            ->requirePresence('fecha_creacion', 'create')
            ->notEmptyDate('fecha_creacion');

        $validator
            ->numeric('precio')
            ->requirePresence('precio', 'create')
            ->notEmptyString('precio');

        return $validator;
    }
}
