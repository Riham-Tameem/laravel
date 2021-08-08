<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\CreateRequest;
use App\Http\Requests\Patient\EditRequest;
use App\Models\City;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(){

        $cities = City::all();
        $items = Patient::get();
        $id = auth()->user()->id;
        //dd($id);
        $items = Patient::where('user_id',$id )
            ->select("patients.*","users.id as userId")
            ->leftJoin("users","users.id","patients.user_id")
            ->get();

        if (empty($items)){
            // dd($items);
            return view("patient.home.profile",compact('cities'));
        }else{
            // dd($items);
            return view("patient.home.profile",compact('items','cities'));
        }
    }
    public function create()
    {
        //
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

        Patient::create([
            'name'=>$request['name'],
            'mobile'=>$request->mobile,
            'city_id'=>$request['city_id'],
            'user_id'=>$id ,
            'gender'=>$request->gender,
            'address'=>$request['address'],
            'image'=>$imageName,

        ]);

        Session()->flash('msg','تم الحفظ بنجاح');

        return redirect(route('profile.store'));
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(EditRequest  $request){
        $id = auth()->user()->id;
        $user_id = Patient::where('user_id',$id)->get();
        if ($request->imgFile){
            //dd($request->imgFile);
            $fileName = $request->imgFile->store('public');
            $imageName = $request->imgFile->hashName();
        }else{
            $oldImage = Patient::where('user_id',$id)->first('image');
            //dd($oldImage);
            $imageName=$oldImage['image'];
        }
        if (!empty($user_id)){
            User::where('id',$id)
                ->update([
                    'name'=>$request['name'],
                    'email'=>$request['email'],

                ]);

            Patient::where('user_id',$id)
                ->update([
                    'name'=>$request['name'],
                    'mobile'=>$request->mobile,
                    'city_id'=>$request['city_id'],
                    'user_id'=>$id ,
                    'gender'=>$request->gender,
                    'address'=>$request['address'],
                    'image'=>$imageName,
                ]);
            Session()->flash('msg','تم التحديث بنجاح');
            return redirect()->back();
        }
    }


    public function destroy($id){
        $patient = Patient::find($id);
        $patient->delete() ;

        $user = User::find($id);

        $user->email .= ' deleted '.$user->id ;
        $user->save() ;
        $user->delete();
        return redirect(route('home'))->with("تم الحذف بنجاح");
        Session()->flash('msg','تم الحذف بنجاح');
        return redirect(route('home'))->with("Account Deleted Successfully");
    }
}
