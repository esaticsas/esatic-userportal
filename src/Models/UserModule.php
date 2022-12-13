<?php

namespace Esatic\ActiveUser\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserModule
 *
 * @property int $id
 * @property int $modules_id
 * @property int $users_id
 * @property bool $view
 * @property bool $create
 * @property bool $update
 *
 * @property Module $module
 * @property User $user
 */
class UserModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'modules_id',
        'users_id',
        'view',
        'create',
        'update'
    ];

    protected $casts = [
        'modules_id' => 'int',
        'users_id' => 'int',
        'view' => 'bool',
        'create' => 'bool',
        'update' => 'bool',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'modules_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}

