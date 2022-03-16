<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

use App\Models\Product;

use App\Models\SupplierProduct;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function supplierList(){
        $supplier = Supplier::all(); //select * from students and also converts it into collection of student oobject
        return view('supplier.supplierlist')->with('supplier',$supplier);
    }

    public function searchSupplier(Request $req){
        if($req->search != ""){
          $searchVar=$req->search; //for see what is searching in search box
          //dd($search);
          $supplier = Supplier::where('name',"LIKE", "%{$req->search}%")->get();
          return view('supplier.supplierlist')
          ->with("searchVar",$searchVar)
          ->with("supplier",$supplier);
        }
        else {
          return back();
        }
    }  


    public function register(){
        return view('supplier.registration');
    }
    public function registersubmit(Request $req)
    {
        //return $req->file('image')->getClientOriginalName();
       // return $req->file('image')->getClientOriginalExtension();

        $this->validate($req,
        [
            'name'=>'required|regex:/^[A-Z a-z]+$/',
            'password'=>'required|min:4',
            'conf_password'=>'required|same:password',
            "email"=>"required|email|unique:officers,email",
            "address"=>"required",
        ],
        [
            'name.required'=>'Please provide name',
            'name.max'=>'Username must not exceed 10 alphabets',
            'conf_password.same'=>'Password and confirm password must match'
        ]);

        $of = new Supplier();
        $of->name = $req->name;
        $of->email = $req->email;
        $of->password = md5($req->password);
        $of->address = $req->address;
        $of->salary = 5000;
    
        //$of->image = 'images/profile.png';
        //$of->image = 'images/profile.png';
        $of->save(); //runs query in db
        
        session()->flash('msg', 'Regiatration Succesful');
        return redirect()->route('supplier.login');
        //return "ok";
    }

    public function login(){
        return view('supplier.login');
    }

    public function loginsubmit(Request $req){
        $this->validate($req,
            [
                'name'=>'required|regex:/^[A-Z a-z]+$/',
                'password'=>'required|min:4',
            ],
            [
                'name.required'=>'Please provide name',
            ]
        );
        $of = Supplier::where('name', $req->name)->where('password', md5($req->password))->first();
        //dd($of);
        if($of){
            session()->put('logged', $of->name);
            return redirect()->route('supplier.home');
        }

         session()->flash('msg', 'username password invalid');
         return redirect()->route('supplier.login');
    }

    public function home(){
        $name = session()->get('logged');
        $of = Supplier::where('name', $name)->first();
        //return $of;
        return view('supplier.home')->with('of', $of);
    }

    public function showProductName(Request $req){
        $supplier = Supplier::where('id',decrypt($req->id))
        ->first();
        return $supplier->product;
    }
    
    
    

    

    //for officer
    // public function supplierDelete(Request $req){
    //     $supplier = Supplier::where('id',($req->id))->delete();
    //     session()->flash('msg3','Supplier deleted successfully!');
    //     return redirect ()->route ('supplier.list');
    // }

    ///for officer
    public function supplierListOfficer(){
        $supplier = Supplier::all(); //select * from students and also converts it into collection of student oobject
        return view('supplier.list')->with('supplier',$supplier);
    }

    ///for officer
    public function searchSupplierOfficer(Request $req){
        if($req->search != ""){
          $searchVar=$req->search; //for see what is searching in search box
          //dd($search);
          $supplier = Supplier::where('name',"LIKE", "%{$req->search}%")->get();
          return view('supplier.list')
          ->with("searchVar",$searchVar)
          ->with("supplier",$supplier);
        }
        else {
          return back();
        }
    }  

}
