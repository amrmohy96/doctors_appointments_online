<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,{$id},id"],
            'password' => ['required', 'string', 'min:6'],
            'gender' => 'required',
            'department' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'description' => 'required',
            'education' => 'required',
            'role_id' => 'required',

        ];
    }
}
