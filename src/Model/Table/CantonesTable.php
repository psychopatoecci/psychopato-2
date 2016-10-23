<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cantones Model
 *
 * @method \App\Model\Entity\Cantone get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cantone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cantone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cantone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cantone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cantone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cantone findOrCreate($search, callable $callback = null)
 */
class CantonesTable extends Table
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

        $this->table('cantones');
        $this->displayField('codCanton');
        $this->primaryKey(['codCanton', 'codProvincia']);
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
            ->integer('codCanton')
            ->allowEmpty('codCanton', 'create');

        $validator
            ->integer('codProvincia')
            ->allowEmpty('codProvincia', 'create');

        $validator
            ->requirePresence('nombreCanton', 'create')
            ->notEmpty('nombreCanton');

        return $validator;
    }
}
