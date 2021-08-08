<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\EditRequest;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use App\Models\Link;
use Monolog\Handler\RollbarHandler;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = request()->q;
        $email = request()->email;
        $items = User::role('admin'); 
      
        if($q)
            $items->whereRaw('name like ?',["%$q%"]);
        if($email)
            $items->whereRaw('email like ?',["%$email%"]);

        $items=$items->orderBy('name')->paginate(10)->appends([
            'q'=>$q,
            'email'=>$email,
            
        ]);
        return view("admin.user.index",compact('items'));
    }

    public function links($id)
    {
        $links = Link::all();
        $item = User::find($id);
        return view('admin.user.links')->with('item',$item)->with('links',$links);
    }
    public function postLinks($id, Request $request)
    {
        \DB::table('user_links')->where('user_id',$id)->delete();//حذف الصلاحيات احلالية
        if($request->links){     
            foreach($request->links as $link){       
                \DB::table('user_links')->insert([
                    'link_id'=>$link,
                    'user_id'=>$id,
                    'created_at'=>new \DateTime(),
                    'updated_at'=>new \DateTime(),
                ]);
            }
        }
        return redirect(route('user.index'))->with('msg','تمت عملية الاضافة بنجاح');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);
        
        $user = User::create($requestData);
        $user->assignRole('admin');
        //send any SMS or Email
        \App\Jobs\InformUsers::dispatch($user);
        
        return redirect(route('user.index'))->with('msg','تمت عملية الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::find($id);
        if(!$item){
            return redirect(route('user.index'))->with("msg","الرجاء التأكد من الرابط");
        }
        return view("admin.user.show")->with('item',$item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::find($id);
        if(!$item){
            return redirect(route('user.index'))->with("msg","الرجاء التأكد من الرابط");
        }
        return view('admin.user.edit')->with('item',$item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $item = User::find($id);
        
        $requestData = $request->all();
       
        $item->update($requestData);
        return redirect(route('user.index'))->with("msg","تمت عملية التعديل بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->id == auth()->user()->id){
            return redirect(route('user.index'))->with('msg','لا يمكن حذف المستخدم المسجل دخول حاليا');
        }
        if($user){
        
            $user->email .= '-deleted-'.$user->id;
            $user->save();
            $user->delete();
            session()->flash("msg","تمت عملية الحذف بنجاح");
        }
        return redirect(route('user.index'));
    }
}
