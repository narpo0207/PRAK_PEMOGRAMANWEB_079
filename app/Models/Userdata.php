<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute; 
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    use HasFactory;

    /** 
* fillable 
* 
* @var array 
*/ 
protected $fillable = [ 
    'full_name', 
    'phone_number', 
    'email', 
    'post_code', 
    'address', 
    ];

     /** 
     * image 
     * 
     * @return Attribute 
     */ 
    protected function image(): Attribute 
    { 
        return Attribute::make( 
            get: fn ($image) => url('/storage/posts/' . $image), 
        ); 
    }
}
