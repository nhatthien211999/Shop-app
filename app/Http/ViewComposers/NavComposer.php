<?php
namespace App\Http\ViewComposers;

use App\Nav;
use App\Models\Category;

class NavComposer
{
    public function compose($view)
    {
        $view->with('menu', Category::all());
    }
}
