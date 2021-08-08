<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
use Validator;

class HomeController extends Controller
{
    function index(){
        return view("admin.home.index");
    }

    function change(){

         return view("admin.home.changePassword");
    }

    function changePassword(Request $request){

       $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ]);
        $input = $request->all();
        $user_id = auth()->user()->id;
      
            
        if ((Hash::check(request('old_password'), auth()->user()->password)) == false) {
            $message = "كلمة المرور الحالية غير صحيحة .";
        } else {
            //User::where('id', $user_id)->update(['password' => Hash::make($input['new_password'])]);  
            User::where('id', $user_id)->update(['password' => bcrypt($input['new_password'])]);
            $message  =  "تم تغيير كلمة المرور بنجاح.";
        }
           
        return redirect(route('admin.change'))->with("msg", $message);
        
    }
}