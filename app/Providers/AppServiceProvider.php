<?php

namespace App\Providers;

use App\Cart;
use App\Product;
use Illuminate\Support\ServiceProvider;
use App\Type_product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.header',function($view){

            if(\Session('cart'))
            {
                $oldCart = \Session::get('cart');
                $cart = new Cart($oldCart);
            }
            $view->with(['cart'=>\Session::get('cart')]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
