<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;

class customerController extends Controller
{
    public function login(Request $req){
    
        if(!$req->submit)
        {
            return view('customer.login');
        }
        else
        {
        
            /*$c = Customer::where("username",$req->username)
                ->where("password",$req->password)->first();
            return redirect()->route('c.home');*/
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
}
//@if($category=="ALL"){{selected}}    @endif
