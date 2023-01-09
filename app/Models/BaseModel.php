<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Wildside\Userstamps\Userstamps;
use App\Models\Scopes\ClubScope;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Userstamps;


    // Default the club_id in every case to that set for the user
    public function setClubIdAttribute($value) {
        $this->attributes['club_id'] = Auth::user()->club_id ?: 0;
    }

    // Default the club_id for every select statement using a Global Scope
    protected static function booted()
    {
        static::addGlobalScope(new ClubScope);
    }
}
