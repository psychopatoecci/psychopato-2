<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Distritos Model
 *
 * @method \App\Model\Entity\Distrito get($primaryKey, $options = [])
 * @method \App\Model\Entity\Distrito newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Distrito[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Distrito|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Distrito patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Distrito[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Distrito findOrCreate($search, callable $callback = null)
 */
class DistritosTable extends Table
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

        $this->table('distritos');
        $this->displayField('nombreProvincia');
        $this->primaryKey(['nombreProvincia', 'nombreCanton', 'nombreDistrito']);
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
            ->allowEmpty('nombreProvincia', 'create');

        $validator
            ->allowEmpty('nombreCanton', 'create');

        $validator
            ->allowEmpty('nombreDistrito', 'create');

        return $validator;
    }
}
