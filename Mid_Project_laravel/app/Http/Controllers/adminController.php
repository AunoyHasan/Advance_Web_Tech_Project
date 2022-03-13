<?php

namespace App\Http\Controllers;
//start google

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

//end google

use Illuminate\Http\Request;
use App\Models\Adminregistration;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Officer;
use App\Models\Cperformance;



class adminController extends Controller
{

  public function adminLogin(){
    return view('adminLogin');
  }

public function adminLoginSubmit(Request $req){
                          $this->validate($req,
                              [

                                  'username'=>'required|regex:/^[A-Z a-z . -]+$/|min:5|max:20',//
                                  'password'=>'required|min:8'

                              ],
                              [
                                  'username.required'=>'Please provide username',
                                  'username.max'=>'Username must not exceed 20 alphabets'
                              ]
                          );
                          $ad = Adminregistration::where('username',$req->username)->where('password',md5($req->password))->first();

                         if($ad) {
                            session()->flush();
                            session()->put('username',$ad->username);
                            session()->flash('msg','login successful!');
                            return redirect()->route('adminDashboard');
                            //session()->get('username')
                            //session()->has('username')
                            //session()->forget('username'),session()->forget(['id','username'])
                            //session()->flush()  --->session destroy
                            //session()->flash('key',value)  ---> This will store the value in session key for sub sequent request
                         }
                         else return "Login Failed";


                  }

  public function adminDashboard(){
                                $all= Adminregistration::all();
                                $allAdmins=count($all);

                                $totalMales=Adminregistration::where('gender','Male')->count();
                                $totalFemales=Adminregistration::where('gender','Female')->count();

                                $admin=Adminregistration::where('username',session()->get('username'))->first();

                                $userCount = Customer::select('id')->get()->count();
                                $productCount=Product::select('id')->get()->count();
                                $employeeCount=Officer::select('id')->get()->count();
                                $performance=Cperformance::select('Year','Sales','Expenses')->get();
                                $data="";

                                foreach ($performance as $key => $val) {
                                  $data.= "['".$val->Year."',".$val->Sales.",".$val->Expenses."],";
                                }

                                return view('adminDashboard',compact('data'))->with('admin',$admin)
                                                             ->with('allAdmin',$allAdmins)
                                                             ->with('totalMales',$totalMales)
                                                             ->with('totalFemales',$totalFemales)
                                                             ->with('userCount',$userCount)
                                                             ->with('productCount',$productCount)
                                                             ->with('performance',$performance)
                                                             ->with('employeeCount',$employeeCount);

                  }

  public function registration(){
                              return view('registration');
                              }

  public function registration_submit(Request $req){

                                $this->validate($req,
                                    [
                                        'name'=>'required',
                                        'username'=>'required|regex:/^[A-Z a-z . -]+$/|min:5|max:20|unique:adminregistrations,username',//
                                        'email'=>'required|email|unique:adminregistrations,email',
                                        'gender'=>'required|',
                                        'password'=>'required|min:8',
                                        'conf_password'=>'required|same:password',
                                        'pro_pic'=>'required|mimes:jpg,png'
                                    ],
                                    [
                                        'username.required'=>'Please provide username',
                                        'username.max'=>'Username must not exceed 20 alphabets',
                                        'conf_password.same'=>'Password and confirm password must match'

                                    ]
                                );

                                $filename= $req->username.'.'.$req->file('pro_pic')->getClientOriginalExtension();
                                $req->file('pro_pic')->storeAs('/public/pro_pic/',$filename);

                                $ad = new Adminregistration();

                                $ad->name = $req->name;
                                $ad->username = $req->username;
                                $ad->email = $req->email;
                                $ad->gender = $req->gender;
                                $ad->pro_pic = "storage/pro_pic/".$filename;
                                $ad->password = md5($req->conf_password);
                                $ad->save(); //runs query in db

                                session()->flash('msg4','ADMIN REGISTRATION SUCCESSFULL! LOGIN NOW!');

                                return view('adminLogin');

                              }

  public function adminlogout(){
        session()->flush();
        return redirect()->route('adminLogin');
  }


}
