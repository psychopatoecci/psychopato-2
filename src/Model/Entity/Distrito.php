<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Distrito Entity
 *
 * @property string $nombreProvincia
 * @property string $nombreCanton
 * @property string $nombreDistrito
 */
class Distrito extends Entity
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
        'nombreProvincia' => false,
        'nombreCanton' => false,
        'nombreDistrito' => false
    ];
}
