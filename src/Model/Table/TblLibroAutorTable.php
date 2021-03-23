<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TblLibroAutor Model
 *
 * @method \App\Model\Entity\TblLibroAutor newEmptyEntity()
 * @method \App\Model\Entity\TblLibroAutor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TblLibroAutor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TblLibroAutor get($primaryKey, $options = [])
 * @method \App\Model\Entity\TblLibroAutor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TblLibroAutor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TblLibroAutor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TblLibroAutor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblLibroAutor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TblLibroAutor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblLibroAutor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblLibroAutor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TblLibroAutor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TblLibroAutorTable extends Table
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

        $this->setTable('tbl_libro_autor');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('TblAutor',[
            'foreignKey'=>'id_autor',
        ]);
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
            ->integer('id_autor')
            ->requirePresence('id_autor', 'create')
            ->notEmptyString('id_autor');

        return $validator;
    }
}
