<?php

namespace Esatic\ActiveUser\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property int $position
 * @property string $icon
 * @property string $link
 * @property string $type
 */
class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label',
        'position',
        'icon',
        'link',
        'type'
    ];
}
