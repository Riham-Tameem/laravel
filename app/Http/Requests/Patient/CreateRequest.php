<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        $id = $this->route('profile');
        $id = auth()->user()->id ;
       // dd($this->route('profile'));

        return [
            'imgFile'=>'required|image',
            'name'=>'required |max:255',
            'email'=>'required |email|unique:users,email,'.$id,
            'mobile'=>'required| numeric |digits:10',
            'city_id'=>'required',
            'gender'=>'required',
            'address'=>'required|max:300'
        ];
    }
}
