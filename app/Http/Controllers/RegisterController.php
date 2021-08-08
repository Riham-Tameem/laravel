<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Speciality;
use App\Models\User;

class RegisterController extends Controller
{
    function doctorRegister(){
        $cities = City::all();
        $specialities = Speciality::all();
        return view('register.doctor')
            ->with('specialities',$specialities)
            ->with('cities',$cities);
    }
    function postDoctorRegister(Request $request){
        $request->validate([
            'name'=>'required |max:255',
            'email'=>'required |email|unique:users',
            'mobile'=>'required| numeric |digits:10',
            'city_id'=>'required',
            'speciality_id'=>'required',
            'gender'=>'required',
            'address'=>'required|max:300',
            ''
        ]);
        
        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);
        $user = User::create($requestData);
        $user->assignRole('doctor');
        $requestData['user_id'] = $user->id;
        Doctor::create($requestData);
        return redirect(asset('login'))->with('msg','Regsitered Successully');
    }
    function patientRegister(){
      $cities = City::all();
      return view('register.patient',compact('cities'));  
    }
    function postPatientRegister(Request $request){
        // dd($request);
        $request->validate([
            'name'=>'required |max:255',
            'email'=>'required |email|unique:users',
            'mobile'=>'required| numeric |digits:10',
            'city_id'=>'required',
            'gender'=>'required',
            'address'=>'required|max:300',
        ]);
        $requestData = $request->all();
        $requestData['password']= bcrypt($requestData['password']); 
        $user = User::create($requestData);
       // dd($user);
        $user->assignRole('patient');      
        $requestData['user_id'] = $user->id;
        Patient::create($requestData);
        return redirect(asset('login'))->with('msg','Regsitered Successully');
    }
}