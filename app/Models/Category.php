<?php

namespace App\Models;
use Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // this is the relationship hasmany

    public function product()
    {
        
        return $this->hasMany(Product::class);
    }

    // this the Accessor with this mutaor we change create at date formate

    public function getCreatedAtAttribute($value)
   {
    //return $value->format('M d Y');
    return  Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
  }
}
