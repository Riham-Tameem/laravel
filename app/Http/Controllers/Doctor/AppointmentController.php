<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppointmentStatus;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\User;
class AppointmentController extends Controller
{
    //
    public function index(){
      
        $user_id = auth()->user()->id;
        $doctor = Doctor::where('user_id',$user_id)->first();
        $doctor_id =$doctor->id;
       // $patients=Patient::all(); 
       $items=Appointment::where('doctor_id', $doctor_id)->get();
       $status=AppointmentStatus::all();
       return view ('doctor.home.appointment')->withItems( $items)->withStatus( $status);
    }
}
