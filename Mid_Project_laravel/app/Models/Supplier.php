<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Officer;
//use App\Models\SupplierProduct;

class Supplier extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function officer(){
        return $this->hasMany(Officer::class);
    }

    public function supplierproduct(){
        return $this->hasMany(SupplierProduct::class);
    }
}
