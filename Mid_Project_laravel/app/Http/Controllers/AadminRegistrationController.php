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
}
