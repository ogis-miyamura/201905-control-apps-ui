<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ParameterTypes Model
 *
 * @property \App\Model\Table\ServerParametersTable|\Cake\ORM\Association\HasMany $ServerParameters
 *
 * @method \App\Model\Entity\ParameterType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ParameterType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ParameterType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ParameterType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ParameterType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ParameterType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ParameterType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ParameterType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ParameterTypesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('parameter_types');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ServerParameters', [
            'foreignKey' => 'parameter_type_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('title')
            ->allowEmptyString('title');

        $validator
            ->scalar('regex')
            ->allowEmptyString('regex');

        $validator
            ->scalar('comment')
            ->allowEmptyString('comment');

        return $validator;
    }
}
