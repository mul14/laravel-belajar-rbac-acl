<?php

namespace App\ViewComposers;

use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $menuList = collect();

        foreach(\App\Menu::all() as $menu)
        {
            foreach($menu->roles as $role)
            {
                if (auth()->check() && auth()->user()->hasRole($role))
                {
                    $menuList->push($menu);
                }
            }
        }

        $view->with('menus', $menuList);
    }
}
