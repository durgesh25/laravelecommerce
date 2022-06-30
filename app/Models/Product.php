<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon;

class Product extends Model
{
    use HasFactory;

    // this is the inverse hasmany relationship

    public function category()
    {
        //return $this->hasMany(Category::class);
        return $this->belongsTo(Category::class);
    }

    public function getCreatedAtAttribute($value)
   {
    //return $value->format('M d Y');
    return  Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
  }
}
