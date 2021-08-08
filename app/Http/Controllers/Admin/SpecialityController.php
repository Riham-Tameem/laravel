<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Speciality\CreateRequest;
use App\Http\Requests\Speciality\EditRequest;
use App\Models\Speciality;

class SpecialityController extends Controller
{

    public function index()
    {
        $items = Speciality::paginate(3);
        return view("admin.speciality.index")->withItems($items);

    }


    


    public function create()
    {
        return view("admin.speciality.create");
    }


    public function store(CreateRequest $request)
    {
        if(!$request->active){
            $request['active'] = '0';
        }
        Speciality::create($request->all());
        return redirect(route('speciality.index'))->with('msg','تمت عملية الاضافة بنجاح');
    }

    public function show($id)
    {
        $item = Speciality::find($id);
        if(!$item){
            return redirect(route('speciality.index'))->with("msg","الرجاء التأكد من الرابط");
        }
        return view("admin.speciality.show")->with('item',$item);
    }



    public function edit($id)
    {
        $item = Speciality::find($id);
        if(!$item){
            return redirect(route('speciality.index'))->with("msg","الرجاء التأكد من الرابط");
        }
        return view("admin.speciality.edit")->with('item',$item);
    }

    public function update(EditRequest $request, $id)
    {
        if(!$request->active){
            $request['active'] = '0';
        }
        $item = Speciality::find($id);
        $item->update($request->all());
        return redirect(route('speciality.index'))->with("msg","تمت عملية الحفظ بنجاح");
    }

    public function destroy($id)
    {
        $item = Speciality::find($id);
        if($item){
            $item->name .= '-deleted-'.$item->id;
            $item->save();
            $item->delete();
            session()->flash("msg","تمت عملية الحذف بنجاح");
        }
        return redirect(route('speciality.index'));
    }
}
