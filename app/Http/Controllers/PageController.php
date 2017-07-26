<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\Type_product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $type_product = Type_product::all();
        view()->share('type_product',$type_product);
    }
    public function getHome()
    {

        $product_new = Product::where('new',1)->paginate(4);
        $product_all = Product::where('id','>',0)->paginate(12);
        $slide = Slide::all();
        return view('pages.home',['product_new'=>$product_new,'slide'=>$slide,'product_all'=>$product_all]);
    }

    public function getLogin()
    {
        return view('pages.login');
    }

    public function getSignup()
    {
        return view('pages.signup');
    }


    public function getContact()
    {
        return view('pages.contact');
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getCheckout()
    {
        return view('pages.checkout');
    }

    public function getPricing()
    {
        return view('pages.pricing');
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        $product_new = Product::where('new',1)->take(3)->get();
        return view('pages.product',['product'=>$product,'product_new'=>$product_new]);
    }

    public function getTypeProduct($id)
    {
        $product = Product::where('id_type',$id)->paginate(3);
        $type = Type_product::find($id);
        return view('pages.product_type',['product'=>$product,'type'=>$type]);
    }

    public function getShopping()
    {
        return view('pages.shopping');
    }
}
