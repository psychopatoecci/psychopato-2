<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdministradoresMigrations Model
 *
 * @method \App\Model\Entity\AdministradoresMigration get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdministradoresMigration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdministradoresMigration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdministradoresMigration|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdministradoresMigration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdministradoresMigration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdministradoresMigration findOrCreate($search, callable $callback = null)
 */
class AdministradoresMigrationsTable extends Table
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

        $this->table('administradores_migrations');
        $this->displayField('identificacion');
        $this->primaryKey('identificacion');
        
        $this->belongsTo('personas', ['foreignKey'=>'identificacion']);
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
            ->integer('salario')
            ->requirePresence('salario', 'create')
            ->notEmpty('salario');

        return $validator;
    }
}
