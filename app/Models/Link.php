<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'route',
        'parent_id',
        'order',
        'active',
        'show_in_menu'
    ];

    function users(){
        return $this->belongsToMany(User::class,'user_links');
    }
}
