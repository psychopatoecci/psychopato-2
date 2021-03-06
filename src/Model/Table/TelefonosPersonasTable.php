<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TelefonosPersonas Model
 *
 * @method \App\Model\Entity\TelefonosPersona get($primaryKey, $options = [])
 * @method \App\Model\Entity\TelefonosPersona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TelefonosPersona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TelefonosPersona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TelefonosPersona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TelefonosPersona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TelefonosPersona findOrCreate($search, callable $callback = null)
 */
class TelefonosPersonasTable extends Table
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

        $this->table('telefonos_personas');
        $this->displayField('identificacion');
        $this->primaryKey(['identificacion', 'tipo_tel']);
        
         $this->belongsTo('Personas');
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
            ->allowEmpty('identificacion', 'create');

        $validator
            ->allowEmpty('tipo_tel', 'create');

        $validator
            ->requirePresence('telefono', 'create')
            ->notEmpty('telefono');

        return $validator;
    }
}
