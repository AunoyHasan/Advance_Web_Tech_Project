<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminregistration;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Officer;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function generatePDF_allProduct()
     {
       $allProduct = Product::select('id','pname','quantity','price','category')->get();

         $pdf = PDF::loadView('pdfAllProduct', compact('allProduct'));

         return $pdf->download('allProductRecord.pdf');


     }
    public function generatePDF_allUser()
    {
      $allUser = Customer::select('id','username','email','created_at')->get();

        $pdf = PDF::loadView('pdfAllUser', compact('allUser'));

        return $pdf->download('allUserRecord.pdf');


    }

    public function generatePDF_allEmployee()
    {
        $employees = Officer::select('id','name','email','salary','address')->get();

        $pdf = PDF::loadView('pdfAllEmployee', compact('employees'));

        return $pdf->download('allEmpRecord.pdf');


    }

    public function generatePDF_allAdmin()
    {
    //  $data = [
    //      $allAd = Adminregistration::select('id','name','username','email','gender','pro_pic')->get(),
    //  ];
        $allAd = Adminregistration::select('id','name','username','email','gender','pro_pic')->get();
        //dd($admins);
      //  $admins =array();
      //  $admins[]=$allAd;
//dd($allAdmin);

        $pdf = PDF::loadView('pdfAllAdmin', compact('allAd'));

        return $pdf->download('allAdminRecord.pdf');


    }
}
