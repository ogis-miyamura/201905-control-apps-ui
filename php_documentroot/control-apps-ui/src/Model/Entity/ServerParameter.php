<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ServerParameter Entity
 *
 * @property int $id
 * @property int $server_id
 * @property int $application_id
 * @property int $parameter_type_id
 * @property string|null $value
 * @property string|null $comment
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $updated
 *
 * @property \App\Model\Entity\Server $server
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\ParameterType $parameter_type
 */
class ServerParameter extends Entity
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
        'server_id' => true,
        'application_id' => true,
        'parameter_type_id' => true,
        'value' => true,
        'comment' => true,
        'created' => true,
        'updated' => true,
        'server' => true,
        'application' => true,
        'parameter_type' => true
    ];
}
