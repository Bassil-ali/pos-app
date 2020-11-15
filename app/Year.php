<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function  product()
    {
        return $this->belongsTo(Product::class);
    }
}
