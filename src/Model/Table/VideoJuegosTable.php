<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VideoJuegos Model
 *
 * @method \App\Model\Entity\VideoJuego get($primaryKey, $options = [])
 * @method \App\Model\Entity\VideoJuego newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VideoJuego[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VideoJuego|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VideoJuego patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VideoJuego[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VideoJuego findOrCreate($search, callable $callback = null)
 */
class VideoJuegosTable extends Table
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

        $this->table('video_juegos');
        $this->displayField('idVideoJuego');
        $this->primaryKey('idVideoJuego'); 
        
        
        
        $this->hasOne('generos',['foreignKey'=>'idVideoJuego']);
        $this->belongsTo('consolas', ['foreignKey'=>'idConsola']);
        $this->belongsTo('productos', [
            'foreignKey' => 'idVideoJuego',
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
            ->allowEmpty('idVideoJuego', 'create');

        $validator
            ->requirePresence('plataforma', 'create')
            ->notEmpty('plataforma');

        $validator
            ->integer('ESRB')
            ->requirePresence('ESRB', 'create')
            ->notEmpty('ESRB');

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        $validator
            ->requirePresence('reqMin', 'create')
            ->notEmpty('reqMin');

        $validator
            ->requirePresence('reqMax', 'create')
            ->notEmpty('reqMax');

        $validator
            ->requirePresence('IdConsola', 'create')
            ->notEmpty('IdConsola');

        return $validator;
    }
}
