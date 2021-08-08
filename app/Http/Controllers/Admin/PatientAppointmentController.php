<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppointmentStatus;
use App\Models\Appointments;
use   Session;
use DB;
class PatientAppointmentController extends Controller
{
    //
 public function index(){
    $counts=DB::table('appointments')->where('id','>=',1)->get()->count();
     return view('admin.appointment.patient.index',compact('counts'));
     
 }

 public function create(){

     $items=Appointments::all();
     return view('admin.patient.appointment.create');
}
public function store(Request $request)
{
    
  
   /* $Appointments = $request->newLine();
    $Appointments=new Appointments();

    for($i = 0; $i < count($Appointments); $i++) {
        $Appointments['notes'] = $request->notes;
        $Appointments['from'] = $request->from;
        $Appointments['to'] = $request->to;
        $Appointments['status_id'] = $request->status_id;
        
      }
    */

    //$images = $request->all();
    /*$posts = $request->all();
    $data = [];
    if(is_array($posts)){
    foreach($posts as $id) {
      $data[] = [
        'notes' => $request->notes,
        'from' => $request->from,
        'to' => $request->to,
      ];
    }
}*/
$data=$request->all();

    Appointments::create($data);   
     
   
    Session::flash("msg","تمت عملية الاضافة بنجاح");
    return redirect(route("appointment.create"));
}

}

