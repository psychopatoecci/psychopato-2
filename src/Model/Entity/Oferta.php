<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Oferta Entity
 *
 * @property string $idProducto
 * @property \Cake\I18n\Time $fechaInicio
 * @property \Cake\I18n\Time $fechaFin
 * @property int $descuento
 */
class Oferta extends Entity
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
        'idProducto' => false,
        'fechaInicio' => false,
        'fechaFin' => false
    ];
}
