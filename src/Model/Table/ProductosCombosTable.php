<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductosCombos Model
 *
 * @method \App\Model\Entity\ProductosCombo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductosCombo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductosCombo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductosCombo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductosCombo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductosCombo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductosCombo findOrCreate($search, callable $callback = null)
 */
class ProductosCombosTable extends Table
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

        $this->table('productos_combos');
        $this->displayField('idCombo');
        $this->primaryKey(['idCombo', 'idProducto']);
    
        $this->belongsTo('productos', [
            'foreignKey' => 'idProducto',
            'joinType' => 'INNER']);
     
     $this->belongsToMany('combos', [
            'foreignKey' => 'idCombo',
            'joinType' => 'INNER']);   
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
            ->allowEmpty('idProducto', 'create');

        return $validator;
    }
}
