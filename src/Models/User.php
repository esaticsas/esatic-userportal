<?php

namespace Esatic\ActiveUser\Models;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $id_crm
 * @property string $type_user
 * @property string $email
 * @property string $password
 * @property bool $active
 */
class User extends \App\Models\User
{
    protected $fillable = [
        'name',
        'last_name',
        'id_crm',
        'type_user',
        'email',
        'password',
        'active',
        'principal_module',
        'principal_module_id'
    ];
}
