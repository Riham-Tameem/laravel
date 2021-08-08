<?php

namespace App\Http\Requests\Admin\Patient;

<<<<<<< HEAD
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 2a93fde1d6a3284d6229c4a51bd3a45b8a90ac3d
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
        $id = $this->route('patient');
        $patient = Patient::find($id);
        $userID = $patient->user_id;
        return [
            'image'=>'image',
            'name'=>'required |max:255',
            'email'=>'required |email|unique:users,email, '.$userID,
            'mobile'=>'required| numeric |digits:10',
            'city_id'=>'required',
            'gender'=>'required',
            'address'=>'required|max:300'
        ];
    }
}
