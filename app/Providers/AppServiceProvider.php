<?php

namespace App\Providers;

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
        if(Session('cart'))
        {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCard);
        }else
        {
            $cart = null;
        }
        view()->share('cart',$cart);
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
