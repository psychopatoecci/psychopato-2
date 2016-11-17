<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CarritoCompras Model
 *
 * @method \App\Model\Entity\CarritoCompra get($primaryKey, $options = [])
 * @method \App\Model\Entity\CarritoCompra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CarritoCompra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CarritoCompra|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CarritoCompra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CarritoCompra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CarritoCompra findOrCreate($search, callable $callback = null)
 */
class CarritoComprasTable extends Table
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

        $this->table('carrito_compras');
        $this->displayField('idProducto');
        $this->primaryKey('idProducto');
        
        $this->hasOne('productos',['foreignKey'=>'idProducto']);
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
            ->requirePresence('idPersona', 'create')
            ->notEmpty('idPersona');

        $validator
            ->allowEmpty('idProducto', 'create');

        $validator
            ->integer('cantidad')
            ->requirePresence('cantidad', 'create')
            ->notEmpty('cantidad');

        return $validator;
    }
}
