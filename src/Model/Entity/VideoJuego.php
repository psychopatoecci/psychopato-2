<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VideoJuego Entity
 *
 * @property string $idVideoJuego
 * @property string $plataforma
 * @property int $ESRB
 * @property string $descripcion
 * @property string $reqMin
 * @property string $reqMax
 * @property string $IdConsola
 */
class VideoJuego extends Entity
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
        'idVideoJuego' => false
    ];
}
