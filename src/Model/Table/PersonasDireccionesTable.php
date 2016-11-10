<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonasDirecciones Model
 *
 * @method \App\Model\Entity\PersonasDireccione get($primaryKey, $options = [])
 * @method \App\Model\Entity\PersonasDireccione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PersonasDireccione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonasDireccione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonasDireccione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PersonasDireccione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonasDireccione findOrCreate($search, callable $callback = null)
 */
class PersonasDireccionesTable extends Table
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

        $this->table('personas_direcciones');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nombreProvincia', 'create')
            ->notEmpty('nombreProvincia');

        $validator
            ->requirePresence('nombreCanton', 'create')
            ->notEmpty('nombreCanton');

        $validator
            ->requirePresence('nombreDistrito', 'create')
            ->notEmpty('nombreDistrito');

        $validator
            ->requirePresence('idPersona', 'create')
            ->notEmpty('idPersona');

        $validator
            ->requirePresence('detalles', 'create')
            ->notEmpty('detalles');

        return $validator;
    }
}
