<?php

namespace App\Http\Requests\Patient;

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
        $id = auth()->user()->id ;
        return [
            'name'=>'required |max:255',
            'email'=>'required |email|unique:users,email,'.$id,
            'mobile'=>'required| numeric |digits:10',
            'city_id'=>'required',
            'gender'=>'required',
            'address'=>'required|max:300'
        ];
    }
}
