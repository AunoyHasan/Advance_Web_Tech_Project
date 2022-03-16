<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;



class ProductController extends Controller
{
    //
    public function home(){
        return view('product.home');
    }
    public function addProduct(){
        return view('product.addproduct');
    }
    public function addProductSubmit(Request $req)
    {
        //return $req->file('picture')->getClientOrginalName();

        $this->validate($req,
        [
            'pname'=>'required|regex:/^[A-Z a-z]+$/',
            'quantity'=>'required',
            'price'=>'required',
            "category"=>"required",
            'picture'=>'required|mimes:jpg,png',
        ],
        [
            'pname.required'=>'Please provide the product name',
            'quantity.required'=>'Quantity must be a number',
            'price.required'=>'Price must be positive and number'
        ]);

        $filename= $req->pname.'.'.$req->file('picture')->getClientOriginalExtension();
        $req->file('picture')->storeAs('/public/picture/',$filename);


        $of = new Product();
        $of->pname = $req->pname;
        $of->quantity = $req->quantity;
        $of->price = $req->price;
        $of->category = $req->category;
        $of->picture= "storage/picture/".$filename;
        //$of->image = 'images/profile.png';
        //$of->image = 'images/profile.png';
        $of->save(); //runs query in db

        session()->flash('msg', 'Prduct Add Succesful');
        return redirect()->route('product.list');
    } 

    public function productList(){
        $products = Product::all(); //select * from students and also converts it into collection of student oobject
        return view('product.productlist')->with('products',$products);
    }

    public function editProduct(Request $req){
        $product = Product::where('id', $req->id)->first();

        //return $product;
        return view('product.editproduct')->with('product', $product);
    }

    public function editProductSubmit(Request $req){
        //$product = Product::where('id', $req->id)->first();
        $product = Product::where('id', $req->id)->first();
        $product->pname=$req->pname;
        $product->quantity=$req->quantity;
        $product->price=$req->price;
        $product->category=$req->category;
        $product->save();

        return redirect ()->route ('product.list');
    }

    public function productDelete(Request $req){

        $product = Product::where('id',($req->id))->delete();
        session()->flash('msg3','Product deleted successfully!');
        return redirect ()->route ('product.list');
    }

    public function searchProduct(Request $req){
        if($req->search != ""){
          $searchVar=$req->search; //for see what is searching in search box
          //dd($search);
          $products = Product::where('pname',"LIKE", "%{$req->search}%")->get();
          return view('product.productlist')
          ->with("searchVar",$searchVar)
          ->with("products",$products);
        }
        else {
          return back();
        }
    }  
}
