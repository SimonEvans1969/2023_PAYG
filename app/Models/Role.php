<?php

namespace App\Models;

class Role extends BaseModel implements Auditable
{
    protected $fillable = [
        'name'
    ];
}
