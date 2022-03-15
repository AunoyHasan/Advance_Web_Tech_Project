<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function customerList(){
        $customers = Customer::all(); //select * from students and also converts it into collection of student oobject
        return view('customer.customerlist')->with('customers',$customers);
    }
    public function customerDelete(Request $req){

        $product = Customer::where('id',($req->id))->delete();
        session()->flash('msg3','Customer deleted successfully!');
        return redirect()->route('customerList');
    }
}
