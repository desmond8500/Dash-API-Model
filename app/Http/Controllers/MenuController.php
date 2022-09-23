<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Gestion des menus
     * @return Menu
     **/

    public static function menus()
    {
        return [
            (object) array(
                'name' => 'Menu',
                'can' => null,
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> </svg>',
                'route' => 'index',
            ),
            (object) array(
                'name' => 'Réglages',
                'can' => null,
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path> <circle cx="12" cy="12" r="3"></circle> </svg>',
                'route' => null,
                'submenu' => [
                    (object) array('name' => 'Réglages',  'route' => 'tabler.reglages', 'target'=> '', 'icon'=> '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path> <circle cx="12" cy="12" r="3"></circle> </svg>'),
                    (object) array('name' => 'Documentation',  'route' => 'tabler.manuals', 'target'=> '', 'icon'=> '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path> <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path> <line x1="3" y1="6" x2="3" y2="19"></line> <line x1="12" y1="6" x2="12" y2="19"></line> <line x1="21" y1="6" x2="21" y2="19"></line> </svg>'),
                    (object) array('name' => 'Infyom GUI',  'route' => 'io_generator_builder', 'target'=> '_blank', 'icon'=> '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-factory-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M3 21h18"></path> <path d="M5 21v-12l5 4v-4l5 4h4"></path> <path d="M19 21v-8l-1.436 -9.574a0.5 .5 0 0 0 -.495 -.426h-1.145a0.5 .5 0 0 0 -.494 .418l-1.43 8.582"></path> <path d="M9 17h1"></path> <path d="M14 17h1"></path> </svg>'),
                ]
            ),
        ];
    }

    public static function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
