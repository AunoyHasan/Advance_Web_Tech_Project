<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Officer;

use Session;

class EmployeeOfficerController extends Controller
{
    //
    public function register(){
        return view('employee.officer.registration');
    }
    public function registersubmit(Request $req)
    {
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

        $of = new Officer();
        $of->name = $req->name;
        $of->email = $req->email;
        $of->password = $req->password;
        $of->address = $req->address;
        $of->salary=5000;
        $of->save(); //runs query in db
        
        session()->flash('msg', 'Regiatration Succesful');
        return redirect()->route('login.submit');
    }  

    public function login(){
        return view('employee.officer.login');
    }

    public function loginsubmit(Request $req){
        $of = Officer::where('name', $req->name)->where('password', $req->password)->first();
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
        return view('officer.details')
        ->with('name',$req->name)
        ->with('id',$req->id - 839);
    }

    public function home(){
        $name = session()->get('logged');
        $of = Officer::where('name', $name)->first();
        //return $of;
        return view('employee.officer.home')->with('of', $of);
    }

    public function logout(){
        session::flush();
        return redirect()->route('login.submit');
    }
}
