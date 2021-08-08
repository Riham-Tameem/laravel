<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory , SoftDeletes ;
    protected $fillable= [
        'name',
        'mobile',
        'city_id',
        'speciality_id',
        'user_id',
        'gender',
        'address',
        'description',
        'image'
    ];
    function city(){
        return $this->belongsTo(City::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    function speciality(){
        return $this->belongsTo(Speciality::class);
    }
}
