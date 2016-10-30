<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $guarded = ['id'];
    
    public function menus(){
        return $this->belongsToMany(Menu::class);
    }
}
