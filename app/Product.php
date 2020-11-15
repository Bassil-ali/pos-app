<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $guarded = [];
    protected $fillable = ['nameS','valueS','month','year'];

    public function months() {
        return $this->hasMany(month::class);

    }
    public function years() {
        return $this->hasMany(Years::class);
    }

    public function monthsP()
    {
        return $this->belongsToMany(month::class);
    }


}//end of model
