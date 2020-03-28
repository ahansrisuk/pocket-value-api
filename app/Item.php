<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;

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

    public function type() {
        return $this->belongsTo(Type::class);
    }

}
