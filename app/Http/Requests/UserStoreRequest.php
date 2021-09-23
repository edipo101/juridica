<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        return [
            'first_name' => 'required',
            'first_surname' => 'required',
            'job_title' => 'required',
            'unit_id' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'profile_id' => 'required',
        ];
    }
}
