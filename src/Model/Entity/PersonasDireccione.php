<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PersonasDireccione Entity
 *
 * @property int $id
 * @property string $nombreProvincia
 * @property string $nombreCanton
 * @property string $nombreDistrito
 * @property string $idPersona
 * @property string $detalles
 */
class PersonasDireccione extends Entity
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
        'id' => false
    ];
}
