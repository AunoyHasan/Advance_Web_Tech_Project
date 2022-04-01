<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

use App\Models\Officer;
use App\Models\Supplier;
use App\Models\Adminregistration;

use Illuminate\Support\Facades\DB;


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
       // $of->password = $req->password;
        $of->address = $req->address;
        $of->salary = 5000;
        $of->image= "storage/image/".$filename;
        $of->supplier_id = 3;
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
        //$of = Officer::where('name', $req->name)->where('password', $req->password)->first();
        //dd($of);
        if($of){
            session()->put('logged', $of->name);
            session()->put('pass', md5($req->password));
            //session()->put('pass', $req->password);
            return redirect()->route('officer.home');
        }

         session()->flash('msg', 'username password invalid');
         return redirect()->route('login.submit');
    }

    public function changePic(){
        return view('employee.officer.profilepic');
    }
    public function changePicsubmit(Request $req)
    {
        $name = session()->get('logged');
        $Officer = Officer::where('name', $name)->first();

        $this->validate($req,
            [
                'imagec'=>'required|mimes:jpg,png',
            ],
        );

        if($req->hasFile('image') ){
            $destination = '/public/image/'.$officer->image;
            if(File::exists($destination) ){
                File::delete($destination);
            }
        }

        $filename= $req->name.'.'.$req->file('imagec')->getClientOriginalExtension();
        $req->file('imagec')->storeAs('/public/image/',$filename);

        $of = new Officer();
        $of->address = $req->address;
        $of->image= "storage/image/".$filename;
        $of->save(); //runs query in db
        
        session()->flash('msg', 'Password Change Succesfully');
        return redirect()->route('officer.profile');
    }  

    public function changePassword(){
        return view('employee.officer.passwordchange');
    }

    public function changePasswordSubmit(Request $req){
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
        //if($pass ==  $req->password ) {
            if($req->new_password == $req->conf_password){
                $of = Officer::where('password', $pass)->first();
                //$of->password = $req->new_password; 
                $of->password = md5($req->new_password);
                $of->save(); //runs query in db
                session()->flash('msg', 'Password Change Succesfully');
                return redirect()->route('officer.setting');
            }
        }
        else{
            session()->flash('msg1', 'Current password does not match your old password...Please try again...');
            return redirect()->route('officer.changepassword');
        } 
    }  

    public function officerList(){
        $officers = Officer::all();
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

    /*
    public function home(){
        $name = session()->get('logged');
        $of = Officer::where('name', $name)->first();
        //return $of;
        return view('employee.officer.home')->with('of', $of);
    }
	*/
	
	 public function home(){
        $name = session()->get('logged');
        $of = Officer::where('name', $name)->first();
        //return $of;

        $result = DB::select(DB::raw("select count(*) as Product_Category, category from products group by category"));
        $chartData = "";
        foreach($result as $list){
            $chartData .= "['".$list->category."',  ".$list->Product_Category."],";
        }
        //$chartData = rtrim($chartData, ",");
        //return $chartData;
        $arr['chartData'] = rtrim($chartData, ",");

        return view('employee.officer.home', $arr)->with('of', $of);
    }

    public function profile(Request $req){
        $name = session()->get('logged');
        $Officer = Officer::where('name', $name)->first();
        return view('employee.officer.profile')->with('Officer',$Officer);
    }

    // public function editProfilePicture(Request $req){
    //     $name = session()->get('logged');
    //     $Officer = Officer::where('name', $name)->first();
    //     return view('employee.officer.chnagepic')->with('Officer',$Officer);
    // }

    // public function editProfilePictureSubmit(Request $req){
    //     $filename= $req->name.'.'.$req->file('image')->getClientOriginalExtension();
    //     $req->file('image')->storeAs('/public/image/',$filename);
        
    //     $name = session()->get('logged');
        
    //     $officer = Officer::where('name', $req->name)->first();
    //     $officer->image= "storage/image/".$filename;
    //     $product->save();
    //     return redirect ()->route ('officer.profile');
    // }

    public function logout(){
        session::flush();
        return redirect()->route('login.submit');
    }

    public function edit(Request $req){
        $of = Officer::where('id',decrypt($req->id))->first();
        return $of->supplier;
    }

    public function setting(){
        return view('employee.officer.setting');
    }
    
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
    
    

    ///Showing Supplier
    //public function showSupplier(Request $req){
        //$of = Officer::where('id',decrypt($req->id))->first();
        //return $of;
        //return $of->supplier;
        //return view('employee.officer.show')->with('of',$req->of);

       // return $of->supplier->name;
  // }

    public function supplierName(Request $req){
        $of = Officer::where('id', $req->id)->first();
        return $of->supplier;
        //$name2 = $of->supplier->name;
        //return view('employee.officer.suppliershow')->with('of', $of);
    }

}
