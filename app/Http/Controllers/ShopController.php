<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
    */
    public function index( Request $request )
    {
        // Redirect if no club context
        if (!$this->club) return redirect()->action([ShopController::class, 'pickClub']);

        // Get visible events
        $query = Event::orderBy('name');
        $query = $this->visibleToMe( $query, $request );
        $events = $events->get();

        return view( 'shop.index', [ 'events' => $events ]);
    }

    /**
     * Display a listing of all clubs for the end user to select.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function pickClub()
    {
        $clubs = Club::orderBy('name')->get();

        return view( 'shop.clubs', [ 'clubs' => $clubs ]);
    }

    /**
     * Display a listing of all clubs for the end user to select.
     *
     * @return query with additional parameters
     *
     */
    private function visibleToMe( $query, Request $request )
    {
        $user = Auth::user();
        $user_type = $user ? $user->type : 0;

        $stati = [];
        $visibility = [];

        // Event Stati & visibility
        switch ($user_type)
        {
            case 0: // Not logged in
                $stati = [ Event::OPEN ];
                $visibility = [ Event::PUBLIC ];
                break;

            case User::MEMBER:
                $stati = [ Event::OPEN ];
                $visibility = [ Event::PUBLIC, Event::MEMBERS_ONLY ];
                break;

            case User::STAFF:
            case User::ADMIN:
            case User::SUPER_ADMIN:
                if ( $request->input('showArchive') ) {
                    $stati = [ Event::DRAFT, Event::OPEN, Event::CLOSED, Event::ARCHIVED ];
                } else {
                    $stati = [ Event::DRAFT, Event::OPEN, Event::CLOSED ];
                }
                $visibility = [ Event::PUBLIC, Event::MEMBERS_ONLY, Event::STAFF_ONLY ];
                break;

            default:
                break;
        }

        if ($stati) $query->whereIn('status', $stati);
        if ($visibility) $query->whereIn('visibility', $visibility);

        return ( $query );
    }
}
