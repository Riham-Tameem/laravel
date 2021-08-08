<?php

namespace App\Http\Requests\Speciality;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        /*return [
            'name'=>'required|max:30|unqiue:categories,name,'.$id
        ];*/
        $id = $this->route('speciality');
        return [
            'name'=>'required|max:30|unique:specialities,name,'.$id
        ];
    }
}
