<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentExtStoreRequest extends FormRequest
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
        $validation = [
            'entry_number' => 'required|unique:documents|numeric',
            'entry_date' => 'required',
            'type_id' => 'required',
            'date' => 'required',
            'amount' => 'required|numeric',
            'add_data' => 'nullable|numeric',
            'reference' => 'required',
            'description' => 'max:1000',
            'attached_file' => 'max:2000',
        ];

        return $validation;
    }
}
