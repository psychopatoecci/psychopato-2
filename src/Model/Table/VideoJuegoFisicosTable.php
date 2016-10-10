<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VideoJuegoFisicos Model
 *
 * @method \App\Model\Entity\VideoJuegoFisico get($primaryKey, $options = [])
 * @method \App\Model\Entity\VideoJuegoFisico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VideoJuegoFisico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VideoJuegoFisico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VideoJuegoFisico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VideoJuegoFisico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VideoJuegoFisico findOrCreate($search, callable $callback = null)
 */
class VideoJuegoFisicosTable extends Table
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

        $this->table('video_juego_fisicos');
        $this->displayField('idVideoJuegoFisico');
        $this->primaryKey('idVideoJuegoFisico');
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
            ->allowEmpty('idVideoJuegoFisico', 'create');

        $validator
            ->integer('existencia')
            ->requirePresence('existencia', 'create')
            ->notEmpty('existencia');

        return $validator;
    }
}
