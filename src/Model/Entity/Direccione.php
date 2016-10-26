<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Direccione Entity
 *
 * @property string $identificacion
 * @property string $tipo_dir
 * @property int $cod_provincia
 * @property int $cod_canton
 * @property int $cod_distrito
 * @property string $detalles
 */
class Direccione extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'identificacion' => false,
        'tipo_dir' => false
    ];
}
