<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = ['id'];
    
    public function dishes(){
        return $this->hasMany(Dish::class);
    }
}
