<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable=[
        'doctor_id',
        'patient_id',
        'day',
        'from',
        'to',
        'status_id',
        'notes'	,
    ];

    function patient(){
        return $this->belongsTo(Patient::class);
    }
    function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    function status(){
        return $this->belongsTo(AppointmentStatus::class);
    }
}
