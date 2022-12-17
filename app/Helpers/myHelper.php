<?php

use App\Models\Navigation;

if (!function_exists('getMenus')) {
    function getMenus()
    {
        $nav = Navigation::with("subMenus")->whereNull("main_menu")->get();
        return $nav;
    }
}
