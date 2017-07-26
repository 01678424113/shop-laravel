<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\Type_product;
use App\User;
use Session;
use App\Cart;
use Illuminate\Support\Facades\Auth;
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

    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('/');
        }else
        {
            return redirect('login')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function getSignup()
    {
        return view('pages.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request,
            [
                'full_name'=>'required|min:5',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:5',
                'passwordAgain'=>'same:password',
                'phone'=>'required',
                'address'=>'required'
            ],
            [
                'full_name.required'=>'Chưa nhập tên',
                'full_name.min'=>'Tên phải dài trên 5 kí tự',
                'email.required'=>'Chưa nhập email',
                'email.email'=>'Email không hợp lệ',
                'email.unique'=>'Email đã tồn tại',
                'password'=>'Chưa nhập pass',
                'password.min'=>'Pass phải dài trên 5 kí tự',
                'passwordAgain'=>'Pass nhập lại chưa đúng',
                'phone.required'=>'Chưa nhập số điện thoại',
                'address.required'=>'Chưa nhập địa chỉ'
            ]);
        $user = new User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('sign')->with('thongbao','Đăng kí thành công');
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

    public function getSession($id)
    {
        $product = Product::find($id);
        $oldCard = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCard);
        $cart->add($product, $id);
        session()->put('cart',$cart);

        return redirect()->back();
    }
}
