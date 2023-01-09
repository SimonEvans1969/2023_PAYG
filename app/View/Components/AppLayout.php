<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class AppLayout extends Component
{
    private $menus;
    /**
     * Create the component instance.
     *
     * @param  No params - all data in session
     * @return void
     */
    public function __construct()
    {
        $this->menus = $this->buildMenus();
    }

    /**
     * Build a multi-level array with the menu structure, called recursively
     *
     * @param parent_id - level to start at - default to 0 (top level)
     *
     * return Array - of menu
     */
    private static function buildMenus( $parent_id = 0 )
    {
        if (session('menus')) return session('menus');

        $menu_entries = Menu::join('permissions', 'menus.permission_id', '=', 'permissions.id')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->join('roles', 'roles.id', '=', 'role_has_permissions.role_id')
                            ->join('user_has_roles','roles.id', '=', 'user_has_roles.role_id')
                            ->join('users','user_has_roles.user_id', '=', 'users.id')
                            ->where('users.id', '=', Auth::user()->id)
                            ->orderBy('menus.position')
                            ->select('menus.position', 'menus.name', 'menus.route')
                            ->get();

        return ($menu_entries);
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app', [ 'menus' => $this->menus ]);
    }
}
