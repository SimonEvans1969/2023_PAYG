<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Wildside\Userstamps\Userstamps;

class Menu extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Userstamps;

    protected $fillable = [
        'id', 'parent_id', 'position', 'permission_id', 'name', 'route'
    ];
}
