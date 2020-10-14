<?php
namespace GetThingsDone\DynamicConfig\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicConfig extends Model
{
    protected $fillable = [
        'key', 'value',
    ];

    protected $casts = [
        'value' => 'array',
    ];
}
