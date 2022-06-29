<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // this is the inverse hasmany relationship

    public function category()
    {
        //return $this->hasMany(Category::class);
        return $this->belongsTo(Category::class);
    }
}
