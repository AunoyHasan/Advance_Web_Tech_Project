<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class customerController extends Controller
{
    public function login(Request $req){
    
        if(!$req->submit)
        {
            return view('customer.login');
        }
        else
        {
        //return $req;
            $req->validate([
            'username'=>'required|min:5|max:40',
            'password'=>'required|min:4',
            ]);
            $c = Customer::where("username",$req->username)
                ->where("password",$req->password)->first();
            if($c)
            {
                session()->put('id', $c->id);
                session()->put('username', $c->username);
                session()->put('email', $c->email);
                $p = Product::all();
                return view('customer.home')
                ->with("products",$p)
                ->with("category","");
            }
            else
            {
                session()->now('status', 'Username or Password Invalid!');
                return view('customer.login');
            }
        }
    }
    public function registration(Request $req){
        if(!$req->submit)
        {
            return view('customer.registration');
        }
        else
        {
            $req->validate([
            'username'=>'required|min:5|max:40',
            'email'=>'required|email',
            'password'=>'required|min:4',
            'confPassword'=>'required|same:password'
            ]);
            $c = new Customer();
            $c->username = $req->username;
            $c->password = md5($req->password);
            $c->email = $req->email;
            $c->save();
            return redirect()->route('c.login');
        }
    }
    public function home(Request $req){
        $p = Product::all();

        return view('customer.home')
        ->with("products",$p)
        ->with("category","");
    }
    public function category(Request $req){
        //return $req->category;
        if ($req->category=="ALL")
        {
            $p = Product::all();
        }
        else
        {
            $p = Product::where('category','=',$req->category)->get();
        }
        //return $p;

        return view('customer.home')
        ->with("products",$p)
        ->with("category",$req->category);
    }
    public function search(Request $req){
    //return $req->search;
        $p = Product::where('pname',"LIKE", "%{$req->search}%")->get();
        //return $p;
        return view('customer.home')
        ->with("products",$p)
        ->with("category","");
    }
    public function addtocart(Request $req)
    {
        $c = new Cart();
        $c->pname = $req->pname;
        $c->price = $req->price;
        $c->quantity = $req->quantity;
        $c->customerId = session()->get('id');
        $c->save();
        $p = Product::All();
        return view('customer.home')
        ->with("products",$p)
        ->with("category","");
    }
    public function edit(Request $req)
    {
        if(!$req->submit)
        {
            return view('customer.edit');
        }
        $c = Customer::where('id','=',session()->get('id'))->first();
        if($req->submit != ""){ // for update 
            $c->username = $req->username;
            $c->email = $req->email;
            $c->save();
            session()->forget(['username', 'email']);// delete previous session
            session()->put('username', $c->username);
            session()->put('email', $c->email);
        }
        $p = Product::All();
        return view('customer.home')
        ->with("products",$p)
        ->with("category","");
    }
    public function cart()
    {
        $p = Cart::where('customerId','=',session()->get('id'))->get();
        return view('customer.cart')
        ->with("products",$p)
        ->with("category","");;
    }
    public function order(Request $req)
    {
        $o = new Order();
        if($req->submit != ""){ // for update 
            $o->pname = $req->pname;
            $o->quantity = $req->quantity;
            $o->price = $req->price;
            $o->customerId = $req->customerId;
            $o->status = "In Order Process";
            $o->save();
            $d = Cart::where('id', $req->id)->delete();
        }
        else if($req->delete != ""){ // for update 
            $d = Cart::where('id', $req->id)->delete();
        }
        return redirect()->route('cart');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('c.login');
    }
}
//@if($category=="ALL"){{selected}}    @endif
