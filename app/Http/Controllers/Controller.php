<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Club;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $club_id;   // Holds the club_id for the current session

    public function __construct()
    {
        // Get the session context
        if (session('club_id')) $this->club_id = session('club_id');
        else {
            // Get from the user
            $user = Auth::user();
            if ($user) {
                $this->club_id = $user->club_id;
                session('club_id', $clubModel->club_id);
            }
            // Get from the subdomain
            $subdomain = explode('.', url()->current())[0];

            // Check if it exists and set variables accordingly
            $clubModel = Club::where('subdomain','=',$subdomain)->first();
            if ($clubModel) {
                $this->club_id = $clubModel->id;
                session('club_id', $clubModel->id);
            }
            else $this->club_id = null;
        }
    }
}
