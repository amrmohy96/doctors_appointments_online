<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
        $id = $this->segment(2);
        $auth = auth()->id();
        $rules = [
            'date' => "required|unique:appointments,date,NULL,id,user_id,{$auth}",
            'from' => 'required',
            'to' => 'required'
        ];
        if(\Request::method() == "PUT"){
            $rules['date'] = "required|unique:appointments,date,{$id},id";
        }
        return  $rules;
    }
}
