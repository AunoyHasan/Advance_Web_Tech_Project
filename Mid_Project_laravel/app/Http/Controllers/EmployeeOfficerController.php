<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

use App\Models\Officer;
use App\Models\Supplier;
use App\Models\Adminregistration;


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
            session()->put('pass', md5($req->password));
            return redirect()->route('officer.home');
        }

         session()->flash('msg', 'username password invalid');
         return redirect()->route('login.submit');
    }

    public function changePassword(){
        return view('employee.officer.passwordchange');
    }

    public function changePasswordSubmit(Request $req)
    {
        $this->validate($req,
        [
            'password'=>'required|min:4',
            'new_password'=>'required|min:4',
            'conf_password'=>'required|same:new_password',
        ],
        [
            'password.required'=>'Please provide current password',
            'new_password.min'=>'Password contains atleat 4 alphabet',
            'conf_password.same'=>'Password and confirm password must be same'
        ]);

        $pass = session()->get('pass');
        
        if($pass ==  md5($req->password) ) {
            if($req->new_password == $req->conf_password){
                $of = Officer::where('password', $pass)->first();
                $of->password = md5($req->new_password);
                $of->save(); //runs query in db

                session()->flash('msg', 'Password Change Succesfully');
                return redirect()->route('officer.setting');

            }
            //else{
                //return "New password and Confirm password are not matched";
               // session()->flash('msg', 'Password Change Succesfully');
                //return redirect()->route('fficer.changepassword');
            //}
        }
        else{
            return "Current password does not match your old passwprd...Please try again...";
        } 
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

    public function setting(){
        return view('employee.officer.setting');
    }

    // public function searchOfficer(Request $req){
    //     if($req->search != ""){
    //       $searchVar=$req->search; //for see what is searching in search box
    //       //dd($search);
    //       $admin = Adminregistration::where('username',"LIKE", "%{$req->search}%")->get();
    //       return view('employee.officer.list')
    //       ->with("searchVar",$searchVar)
    //       ->with("admin",$admin);
    //     }
    //     else {
    //       return back();
    //     }
    // }  
    
    public function searchOfficer(Request $req){
        if($req->search != ""){
            $searchVar=$req->search; //for see what is searching in search box
            //dd($search);
            $officers = Officer::where('name',"LIKE", "%{$req->search}%")->get();

            foreach($officers as $of){
                if($of->name==$searchVar){
                    return view('employee.officer.list')
                    ->with("searchVar",$searchVar)
                    ->with("officers",$officers);
                }
                else{
                    return "<center>"."<h2>".$searchVar." is not found in the Ofiicers List"."</h2>"."</center>";
                }
            }
        }
        else {
            return back();
        }
    }  

}
