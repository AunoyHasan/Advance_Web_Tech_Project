<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

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
               /* $p = Product::all();
                return view('customer.home')
                ->with("products",$p)
                ->with("category","");*/
                $p = Product::all();
               // $c = Product::distinct()->get(['category']);
               // return $c;
               return view('customer.home')
               ->with("products",$p)
               ->with("category","");
               //->with("categorys",$c);
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
        $c = Product::distinct()->get(['category']);
       // return $c;
       return view('customer.home')
        ->with("products",$p)
        ->with("category","");
        //->with("category",$c);
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
        $c = Cart::where('customerId','=',session()->get('id'))->where('pname','=',$req->pname)->first();
        if($c){      
        $c->quantity+=1;
        $c->save();
        }
        else{
        $c = new Cart();
        $c->pname = $req->pname;
        $c->price = $req->price;
        $c->quantity = $req->quantity;
        $c->customerId = session()->get('id');
        $c->save();
        }
        /*$p = Product::All();
        return view('customer.cart')
        ->with("products",$p)
        ->with("category","");*/
        return redirect()->route('cart');
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
        $totalPrice = 0;
        foreach($p as $eachProduct){//total price
            $totalPrice = $totalPrice + ($eachProduct->quantity * $eachProduct->price);
        }
        return view('customer.cart')
        ->with("products",$p)
        ->with("category","")
        ->with("totalPrice",$totalPrice);
    }
    public function order(Request $req)
    {
        $o = new Order();
        if($req->submit != ""){ // for update 
            $o->pname = $req->pname;
            $o->quantity = $req->quantity;
            $o->price = $req->price;
            $o->customerId = $req->customerId;
            $o->status = "Order Processing";
            $o->save();
            $d = Cart::where('id', $req->id)->delete();
        }
        else if($req->delete != ""){ // for update 
            $d = Cart::where('id', $req->id)->delete();
        }
        return redirect()->route('cart');
    }
    public function piechart()
    {
        $values = DB::select(DB::raw("select count(*) as Total_Order, pname as Product_Name from orders group by pname"));
        //return $value;
        $ary="";
        foreach($values as $v){
            $ary .= "['".$v->Product_Name."',   ".$v->Total_Order."],";
        }
        $ary = rtrim($ary,',');
        //return $ary;
        return view('customer.piechart')
        ->with("category","")
        ->with("values",$ary);
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('c.login');
    }
}
//@if($category=="ALL"){{selected}}    @endif
