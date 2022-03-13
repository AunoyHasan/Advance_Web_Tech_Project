<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Officer;

class Supplier extends Model
{
    use HasFactory;
    public function officer(){
        return $this->hasMany(Officer::class);
    }
}
