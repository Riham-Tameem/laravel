<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppointmentStatus;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use   Session;
class AppointmentController extends Controller
{
  public function index(){
      
      $q = request()->q;
      $items=Appointment::whereRaw('true');
      if($q){
        $items->whereHas('Doctor', function($query) use($q){
            $query->where('name','like',"%$q%");  
        });
        $items->orWhereHas('Patient', function($query) use($q){
            $query->where('name','like',"%$q%");  
        });
        /*$items->leftJoin('doctors','doctor_id','doctors.id')
          ->where('name','like',"%$q%");*/
      }      
      $items = $items/*->select('appointments.*')*/
        ->orderBy('id','desc')
        ->paginate(10)
        ->appends(['q'=>$q]);
      $status=AppointmentStatus::all();
      return view('admin.appointment.index')
        ->withItems( $items)
        ->withStatus( $status);    
  }

  public function create(){
      $status=AppointmentStatus::all();
      $patients=Patient::all();     
      $doctors=Doctor::all();     
      return view ('admin.appointment.create',compact('status','doctors','patients'));
  }
  public function store(Request $request)
  {      
      $request->validate([
        'doctor_id'=>'required',
        'patient_id'=>'required',
        'day'=>'required',
        'from'=>'required',
        'to'=>'required',
      ]);
      $data=$request->all();
      Appointment::create($data); 
      Session::flash("msg","تمت عملية الاضافة بنجاح");
      return redirect(route("appointment.create"));
  }
  public function destroy($id)
  {      
      $item = Appointment::find($id); 
      $item->delete();
      Session::flash("msg","تمت عملية الاضافة بنجاح");
      return redirect(route("appointment.index"));
  }
  public function updateStatus()
  {      
      $id = request()->id;
      $statusId = request()->status_id;
      $item = Appointment::find($id); 
      if($item){
        $item->status_id = $statusId;
        $item->save();
        return response()->json([
          'status'=>1,
          'msg'=>'Status updated successfully'
        ]);
      }
      else{
        return response()->json([
          'status'=>0,
          'msg'=>'Invalid Appoinment ID'
        ]);
      }
  }
}