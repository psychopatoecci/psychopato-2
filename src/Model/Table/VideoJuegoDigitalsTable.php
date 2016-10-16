<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VideoJuegoDigitals Model
 *
 * @method \App\Model\Entity\VideoJuegoDigital get($primaryKey, $options = [])
 * @method \App\Model\Entity\VideoJuegoDigital newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VideoJuegoDigital[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VideoJuegoDigital|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VideoJuegoDigital patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VideoJuegoDigital[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VideoJuegoDigital findOrCreate($search, callable $callback = null)
 */
class VideoJuegoDigitalsTable extends Table
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

        $this->table('video_juego_digitals');
        $this->displayField('idVideoJuegoDigital');
        $this->primaryKey('idVideoJuegoDigital');
        
        $this->belongsTo('video_juegos', [
            'foreignKey' => 'idVideoJuegoDigital',
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
            ->allowEmpty('idVideoJuegoDigital', 'create');

        $validator
            ->requirePresence('tamano', 'create')
            ->notEmpty('tamano');

        $validator
            ->requirePresence('formatoDescarga', 'create')
            ->notEmpty('formatoDescarga');

        return $validator;
    }
}
