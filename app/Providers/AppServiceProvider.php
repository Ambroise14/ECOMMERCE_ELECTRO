<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer("*",function($view){
          return $view->with('datapanier',Cart::where('user_id',Auth::id())->get());
        });

        View()->composer("*",function($view){
            return $view->with('listcategory',category::all());
          });
    }
}
