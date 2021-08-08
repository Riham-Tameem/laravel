<?php

namespace App\Http\Requests\Admin\Doctor;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('doctor');
        $doctor = Doctor::find($id);
        $userID = $doctor->user_id;
        return [
            'image'=>'image',
            'name'=>'required |max:255',
            'email'=>'required |email|unique:users,email, '.$userID,
            'mobile'=>'required| numeric |digits:10',
            'city_id'=>'required',
            'gender'=>'required',
            'address'=>'required|max:300',
            'description'=>'max:300'
        ];
    }
}
