<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\Location;

class Item extends Model
{
    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'name', 'email',
    // ];

    public function type() 
    {
        return $this->belongsTo(Type::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

}
