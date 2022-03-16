<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\SupplierProduct;



class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function supplierproduct(){
        return $this->hasMany(SupplierProduct::class);
    }

}
