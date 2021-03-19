<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TblLibro Entity
 *
 * @property int $id
 * @property string $titulo
 * @property \Cake\I18n\FrozenDate $fecha_creacion
 * @property float $precio
 */
class TblLibro extends Entity
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
        'titulo' => true,
        'fecha_creacion' => true,
        'precio' => true,
    ];
}
