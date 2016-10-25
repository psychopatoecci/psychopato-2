<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Componente Entity
 *
 * @property string $idComponente
 * @property string $descripcion
 * @property string $nombreComponente
 */
class Componente extends Entity
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
        'idComponente' => false
    ];
}