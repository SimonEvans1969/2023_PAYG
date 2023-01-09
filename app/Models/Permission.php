<?php

namespace App\Models;

class Permission extends BaseModel
{
    protected $fillable = [
        'route', 'description'
    ];
}
