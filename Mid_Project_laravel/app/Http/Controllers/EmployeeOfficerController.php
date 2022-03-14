<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

use App\Models\Officer;
use App\Models\Supplier;

use Session;

class EmployeeOfficerController extends Controller
{
    //
    public function register(){
        return view('employee.officer.registration');
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
            'image'=>'required|mimes:jpg,png',
        ],
        [
            'name.required'=>'Please provide name',
            'name.max'=>'Username must not exceed 10 alphabets',
            'conf_password.same'=>'Password and confirm password must match'
        ]);

        $filename= $req->name.'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->storeAs('/public/image/',$filename);

        $of = new Officer();
        $of->name = $req->name;
        $of->email = $req->email;
        $of->password = md5($req->password);
        $of->address = $req->address;
        $of->salary = 5000;
        $of->image= "storage/image/".$filename;
        $of->supplier_id = 3;
        //$of->image = 'images/profile.png';
        //$of->image = 'images/profile.png';
        $of->save(); //runs query in db
        
        session()->flash('msg', 'Regiatration Succesful');
        return redirect()->route('login.submit');
    }  

    public function login(){
        return view('employee.officer.login');
    }

    // public function loginsubmit(Request $req){
    //     $of = Officer::where('name', $req->name)->where('password', $req->password)->first();
    //     //dd($of);
    //     if($of){
    //         session()->put('logged', $of->name);
    //         return redirect()->route('officer.home');
    //     }

    //      session()->flash('msg', 'username password invalid');
    //      return redirect()->route('login.submit');
    // }

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
        $of = Officer::where('name', $req->name)->where('password', md5($req->password))->first();
        //dd($of);
        if($of){
            session()->put('logged', $of->name);
            return redirect()->route('officer.home');
        }

         session()->flash('msg', 'username password invalid');
         return redirect()->route('login.submit');
    }

    public function officerList(){
        $officers = Officer::all(); //select * from students and also converts it into collection of student oobject
        return view('employee.officer.list')->with('officers',$officers);
    }

    public function details(Request $req){
        return view('employee.officer.details')
        ->with('name',$req->name)
        ->with('id',$req->id - 839)
        ->with('email',$req->email)
        ->with('address',$req->address)
        ->with('created_at',$req->created_at);
    }

    public function home(){
        $name = session()->get('logged');
        $of = Officer::where('name', $name)->first();
        //return $of;
        return view('employee.officer.home')->with('of', $of);

        
    }

    public function profile(Request $req){
        // $name = session()->get('logged');
        // $o = Officer::where('name', $name)->first();
        // //return $of;
        // return view('employee.officer.profile')->with('o', $o);
        return view('employee.officer.profile')
        ->with('name',$req->name)
        ->with('id',$req->id - 839)
        ->with('email',$req->email)
        ->with('address',$req->address)
        ->with('created_at',$req->created_at);

    }

    public function logout(){
        session::flush();
        return redirect()->route('login.submit');
    }

    public function edit(Request $req){
        $of = Officer::where('id',decrypt($req->id))->first();
        //return $of;
        return $of->supplier;
    }
}
