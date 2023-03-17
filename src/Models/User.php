<?php

namespace Esatic\ActiveUser\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

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
 * @property string $account_id
 * @property string $principal_module_id
 */
class User extends \App\Models\User {

    protected $fillable = [
        'name',
        'last_name',
        'id_crm',
        'type_user',
        'email',
        'password',
        'active',
        'principal_module',
        'principal_module_id',
        'account_id',
        'account_name'
    ];

    public function user_modules(): HasMany {
        return $this->hasMany(UserModule::class, 'users_id', 'id');
    }

}
