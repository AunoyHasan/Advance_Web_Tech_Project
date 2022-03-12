<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminregistration;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to RAYHAN KHAN RIDOY ZONE!!!',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('ridoy.pdf');


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

        return $pdf->download('allAdmin.pdf');


    }
}
