<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminregistration;

class adminCrudController extends Controller
{
  public function viewAllAdmin(){
      $admins = Adminregistration::select('id','name','username','email','gender','pro_pic')->get();
      return view('viewAllAdmin')->with('admins',$admins);
    }

   public function adminEdit(Request $req){
           $admin = Adminregistration::where('id',decrypt($req->id))->select('id','name','username','email','gender','pro_pic')->first();

            return view('adminEdit')->with('admin',$admin);
  }


  public function adminEditSubmit(Request $req){
    $this->validate($req,
        [
            'name'=>'required',
            'username'=>'required|regex:/^[A-Z a-z . -]+$/|min:5|max:20|unique:adminregistrations,username',//
            'email'=>'required|email|unique:adminregistrations,email',
            'gender'=>'required',
            'pro_pic'=>'required|mimes:jpg,png'
        ],
        [
            'username.required'=>'Please provide username',
            'username.max'=>'Username must not exceed 20 alphabets'


        ]
    );

    $filename= $req->username.'.'.$req->file('pro_pic')->getClientOriginalExtension();
    $req->file('pro_pic')->storeAs('/public/pro_pic/',$filename);


  $admin = Adminregistration::where('id',$req->id)->first();

    $admin->name=$req->name;
    $admin->username=$req->username;
    $admin->email=$req->email;
    $admin->gender=$req->gender;
    $admin->pro_pic="storage/pro_pic/".$filename;




    $admin->save();
    session()->flash('msg2','Updated successfully!');
    return redirect ()->route ( 'viewAllAdmin' );
  }


  public function adminDelete(Request $req){

    $admin = Adminregistration::where('id',($req->id))->delete();
    session()->flash('msg3','Admin deleted successfully!');
    return redirect ()->route ( 'viewAllAdmin' );
  }


}
