<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    protected $guarded = [];
    protected $fillable = ['nameA','nameV','month','year'];

    public function months() {
        return $this->hasMany(month::class);
    }

    public function years() {
        return $this->hasMany(Years::class);
    }

    public function monthsC()
    {
        return $this->belongsToMany(month::class);
    }


}//end of model
