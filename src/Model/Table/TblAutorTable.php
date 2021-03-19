<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TblAutor Model
 *
 * @method \App\Model\Entity\TblAutor newEmptyEntity()
 * @method \App\Model\Entity\TblAutor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TblAutor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TblAutor get($primaryKey, $options = [])
 * @method \App\Model\Entity\TblAutor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TblAutor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TblAutor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TblAutor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblAutor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblAutor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblAutor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblAutor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblAutor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TblAutorTable extends Table
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

        $this->setTable('tbl_autor');
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
            ->scalar('nombre')
            ->maxLength('nombre', 150)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('apellido')
            ->maxLength('apellido', 150)
            ->requirePresence('apellido', 'create')
            ->notEmptyString('apellido');

        return $validator;
    }
}
