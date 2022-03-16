<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminregistration;

class AadminRegistrationController extends Controller
{
    //
    public function viewAllAdmin(){
        $admins = Adminregistration::select('id','name','username','email','gender','pro_pic')->get();
        return view('admin.adminlist')->with('admins',$admins);
    }
    public function searchAdmin(Request $req){
        if($req->search != ""){
          $searchVar=$req->search; //for see what is searching in search box
          //dd($search);
          $admins = Adminregistration::where('name',"LIKE", "%{$req->search}%")->get();
          return view('admin.adminlist')
          ->with("searchVar",$searchVar)
          ->with("admins",$admins);
        }
        else {
          return back();
        }
    }
}
