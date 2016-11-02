<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tarjetas Model
 *
 * @method \App\Model\Entity\Tarjeta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tarjeta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tarjeta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tarjeta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tarjeta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tarjeta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tarjeta findOrCreate($search, callable $callback = null)
 */
class TarjetasTable extends Table
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
	$this->primaryKey(['idPersona', 'idTarjeta']);
        $this->table('tarjetas');
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
            ->requirePresence('idTarjeta', 'create')
            ->notEmpty('idTarjeta');

        $validator
            ->requirePresence('idPersona', 'create')
            ->notEmpty('idPersona');

        $validator
            ->integer('csv')
            ->requirePresence('csv', 'create')
            ->notEmpty('csv');

        return $validator;
    }
}
