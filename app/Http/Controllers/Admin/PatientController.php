<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\Patient\CreateRequest;
use App\Http\Requests\Admin\Patient\EditRequest;
class PatientController extends Controller
{
    public function index()
    {
        $q = request()->q;
        $city = request()->city;
        $mobile = request()->mobile;
        $gender = request()->gender ;
        $cities = City::all();

        $items = Patient::whereRaw('true');
        if($q)
            $items->whereRaw('(name like ? or mobile like ?)',["%$q%", "%$q%"]);
        if($mobile)
            $items->whereRaw('mobile like ?',["%$mobile%"]);

        if($city)
            $items->where('city_id',$city);

        if($gender)
            $items->where('gender',$gender);

        $items=$items->orderBy('name')->paginate(10)->appends([
            'q'=>$q,
            'mobile'=>$mobile,
            'city'=>$city,
            'gender'=>$gender
            
        ]);
        return view("admin.patient.index",compact('cities','items'));
    }


    public function create()
    {
        $cities = City::all();
        return view("admin.patient.create",compact('cities'));
    }


    public function store(CreateRequest $request)
    {
        $requestData = $request->all();
        //dd($requestData);
        $requestData['password'] = bcrypt('123456789');
        if($request->image){
            $imagePath = $requestData['image']->store('public/images');
       // $requestData['image']= $requestData['image']->hashName();
         $requestData['image'] = $request->image->hashName();
        }
        $user = User::create($requestData);
        
        $user->assignRole('patient');
        $requestData['user_id'] = $user->id;
       // dd($requestData);
        Patient::create($requestData);
        
        return redirect(route('patient.index'))->with('msg','تمت عملية الاضافة بنجاح');
    }

    public function show($id)
    {
        $item = Patient::find($id);
        if(!$item){
            return redirect(route('patient.index'))->with("msg","الرجاء التأكد من الرابط");
        }
        return view("admin.patient.show")->with('item',$item);
    }



    public function edit($id)
    {
        $item = Patient::find($id);
        if(!$item){
            return redirect(route('patient.index'))->with("msg","الرجاء التأكد من الرابط");
        }
        $cities = City::all();
        return view("admin.patient.edit")->with('item',$item)
        ->with('cities',$cities);
    }

    public function update(EditRequest $request, $id)
    {
        $item = Patient::find($id);
        
        $requestData = $request->all();
        if($request->image){
            $imagePath = $requestData['image']->store('public/images');
            $requestData['image'] = $request->image->hashName();
        }
        $item->update($requestData);
        $user = User::find($item->user_id);
        $user->update($request->all());
        return redirect(route('patient.index'))->with("msg","تمت عملية التعديل بنجاح");
    }

    public function destroy($id)
    {
        $item = Patient::find($id);
        if($item){
            $user = User::find($item->user_id);
            $user->email .= '-deleted-'.$user->id;
            $user->save();
            $user->delete();
            $item->delete();
            session()->flash("msg","تمت عملية الحذف بنجاح");
        }
        return redirect(route('patient.index'));
    }
}
