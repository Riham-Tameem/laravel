<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory , SoftDeletes ;
    protected $fillable= [
        'name',
        'mobile',
        'city_id',
        'user_id',
        'gender',
        'address',
        'image'
    ];
    function city(){
        return $this->belongsTo(City::class);
    }
    function  user(){
        return $this->belongsTo(User::class);
    }
}
