<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class month extends Model
{
    protected $fillable = ['month','year'];




    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function  product()
    {
        return $this->belongsToMany(Product::class);
    }




}
