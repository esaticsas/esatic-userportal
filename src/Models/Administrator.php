<?php

namespace Esatic\ActiveUser\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Administrator
 *
 * @property int $id
 * @property string $name
 * @property string $username
 *
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Administrator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'name'
    ];
}
