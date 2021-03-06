<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductManage extends Model
{
    use HasFactory;

    public function Category(){

        return $this->belongsTo(CategoryManage::class,'category_id','id');
    }
}
