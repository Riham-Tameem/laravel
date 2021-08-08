<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\Doctor\CreateRequest;
use App\Http\Requests\Admin\Doctor\EditRequest;
class DoctorController extends Controller
{
    public function index()
    {
        $q = request()->q;
        $city = request()->city;
        $mobile = request()->mobile;
        $gender = request()->gender ;
        $cities = City::all();
        $specialities = Speciality::all();
       
        $items = Doctor::whereRaw('true');
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
        return view("admin.doctor.index",compact('cities','items','specialities'));
    }


    public function create()
    {
        $cities = City::all();
        $specialities = Speciality::all();
        return view("admin.doctor.create",compact('cities','specialities'));
    }


    public function store(CreateRequest $request)
    {
        $requestData = $request->all();
        $requestData['password'] = bcrypt('123456789');
        if($request->image){
            $imagePath = $requestData['image']->store('public/images');
            $requestData['image'] = $request->image->hashName();
        }
        $user = User::create($requestData);
        $user->assignRole('doctor');
        $requestData['user_id'] = $user->id;
        Doctor::create($requestData);
        return redirect(route('doctor.index'))->with('msg','تمت عملية الاضافة بنجاح');
    }

    public function show($id)
    {
        $item = Doctor::find($id);
        if(!$item){
            return redirect(route('doctor.index'))->with("msg","الرجاء التأكد من الرابط");
        }
        return view("admin.doctor.show")->with('item',$item);
    }



    public function edit($id)
    {
        $item = Doctor::find($id);
        if(!$item){
            return redirect(route('doctor.index'))->with("msg","الرجاء التأكد من الرابط");
        }
        $specialities = Speciality::all();
        $cities = City::all();
        return view("admin.doctor.edit")->with('item',$item)
        ->with('cities',$cities)
        ->with('specialities',$specialities);
    }

    public function update(EditRequest $request, $id)
    {
        $item = Doctor::find($id);
        
        $requestData = $request->all();
        if($request->image){
            $imagePath = $requestData['image']->store('public/images');
            $requestData['image'] = $request->image->hashName();
        }
        $item->update($requestData);
        $user = User::find($item->user_id);
        $user->update($request->all());
        return redirect(route('doctor.index'))->with("msg","تمت عملية التعديل بنجاح");
    }

    public function destroy($id)
    {
        $item = Doctor::find($id);
        if($item){
            $user = User::find($item->user_id);
            $user->email .= '-deleted-'.$user->id;
            $user->save();
            $user->delete();
            $item->delete();
            session()->flash("msg","تمت عملية الحذف بنجاح");
        }
        return redirect(route('doctor.index'));
    }
}
