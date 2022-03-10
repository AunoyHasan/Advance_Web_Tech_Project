<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Officer;

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

        return "<h1>The form is submitted with $req->name</h1>";
    }  

    public function login(){
        return view('employee.officer.login');
    }

    public function loginsubmit(Request $req){
        $of = Officer::where('name', $req->name)->where('password', $req->password)->first();

        //dd($of);

        //return $of;
        if($of){
          //  return "ok";
           session()->put('logged', $of->username);
           return redirect()->route('officer.home');
        }

        session()->flash('msg', 'username password invalid');
        return redirect()->route('login.submit');

    }

    public function home(){
        return view('employee.dashboard.home');
    }
}
