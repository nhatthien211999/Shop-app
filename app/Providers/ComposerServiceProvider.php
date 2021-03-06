<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       // You can use a class for composer
        // you will need NavComposer@compose method
        // which will be called everythime partials.nav is requested
        View::composer(
            'includes.hero', 'App\Http\ViewComposers\NavComposer'
        );


        ///cách 2
        // You can use Closure based composers
        // which will be used to resolve any data
        // in this case we will pass menu items from database
        View::composer('categories.category', function ($view) {
            $view->with('categories', Category::all());
        });
        View::composer('includes.hero-details', function ($view) {
            $view->with('categoriesHeroDetails', Category::all());
        });

        View::composer('categories.category-menu', function ($view) {
            $menus = '';

            if(Auth::user()->shop){
                $menus = Menu::all()->where('shop_id', Auth::user()->shop->id);
                $view->with('menus', $menus);
            }

            $view->with('menus', $menus);
        });
    }
}
