<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\CreateRequest;
use App\Http\Requests\Doctor\EditRequest;
use App\Models\City;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function index(){

        $cities = City::all();
        $items = Doctor::get();
        $id = auth()->user()->id;
        //dd($id);
        $items = Doctor::where('user_id',$id )
            ->select("doctors.*","users.id as userId")
            ->leftJoin("users","users.id","doctors.user_id")
            ->get();

        if (empty($items)){
            // dd($items);
            return view("doctor.home.profile",compact('cities'));
        }else{
            // dd($items);
            return view("doctor.home.profile",compact('items','cities'));
        }
    }


    public function create()
    {

    }


    public function store(CreateRequest $request){

        $id = auth()->user()->id;

        if ($request->imgFile){

            $fileName = $request->imgFile->store('public');
            $imageName = $request->imgFile->hashName();

        }
        User::where('id',$id)
            ->update([
                'name'=>$request['name'],
                'email'=>$request['email'],

            ]);

        Doctor::create([
            'name'=>$request['name'],
            'mobile'=>$request->mobile,
            'city_id'=>$request['city_id'],
            'user_id'=>$id ,
            'gender'=>$request->gender,
            'address'=>$request['address'],
            'description'=>$request['description'],
            'image'=>$imageName,

        ]);

        Session()->flash('msg','تم الحفظ بنجاح');

        return redirect(route('profile.store'));
    }


    public function show($id)
    {

    }

    public function edit($id)
    {

    }
    public function update(EditRequest  $request){
        $id = auth()->user()->id;
        $user_id = Doctor::where('user_id',$id)->get();
        if ($request->imgFile){
            //dd($request->imgFile);
            $fileName = $request->imgFile->store('public');
            $imageName = $request->imgFile->hashName();
        }else{
            $oldImage = Doctor::where('user_id',$id)->first('image');
            //dd($oldImage);
            $imageName=$oldImage['image'];
        }
        if (!empty($user_id)){
            User::where('id',$id)
                ->update([
                    'name'=>$request->name,
                    'email'=>$request->email,

                ]);

            Doctor::where('user_id',$id)
                ->update([
                    'name'=>$request['name'],
                    'mobile'=>$request->mobile,
                    'city_id'=>$request['city_id'],
                    'user_id'=>$id ,
                    'gender'=>$request->gender,
                    'address'=>$request['address'],
                    'description'=>$request['description'],
                    'image'=>$imageName,
                ]);
            Session()->flash('msg','تم التحديث بنجاح');
            return redirect()->back();
        }
    }


    public function destroy($id){
        //$id = auth()->user()->id;
        //dd('hello');
        Doctor::where('user_id',$id)->delete() ;

//        User::where('id',$id)->update(
//            [
//                'id'=> '0'.$id ,
//                'email'=>$id.' deleted',
//            ]
//        );
        User::where('id',$id)->delete() ;
        Session()->flash('msg','تم الحذف بنجاح');
        return redirect(route('home'))->with("Account Deleted Successfully");
    }
}
