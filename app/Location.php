<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Location extends Model {
    
    public function items() 
    {
        return $this->hasMany(Item::class);
    }
}