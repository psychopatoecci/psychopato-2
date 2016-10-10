<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Combos Model
 *
 * @method \App\Model\Entity\Combo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Combo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Combo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Combo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Combo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Combo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Combo findOrCreate($search, callable $callback = null)
 */
class CombosTable extends Table
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

        $this->table('combos');
        $this->displayField('idCombo');
        $this->primaryKey('idCombo');
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
            ->allowEmpty('idCombo', 'create');

        $validator
            ->date('fechaInicio')
            ->requirePresence('fechaInicio', 'create')
            ->notEmpty('fechaInicio');

        $validator
            ->date('fechaFin')
            ->requirePresence('fechaFin', 'create')
            ->notEmpty('fechaFin');

        $validator
            ->integer('precioCombo')
            ->requirePresence('precioCombo', 'create')
            ->notEmpty('precioCombo');

        return $validator;
    }
}
