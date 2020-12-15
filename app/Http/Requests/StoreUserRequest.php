<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'role_id' => 'required|integer|min:1',
            'first_name' => 'required|max:45',
            'middle_name' => 'nullable|max:45',
            'last_name' => 'required|max:45',
            'suffix' => 'nullable|max:10',
            'sex' => [
                'required',
                'max:1',
                Rule::in(['M', 'F'])
            ],
            'birthdate' => 'required|date',
            'contact_number' => 'required|min:11|max:11',
            'specialization' => 'nullable|max:45',
            'citizenship' => 'nullable|max:45',
            'religion' => 'nullable|max:45',
            'purok' => 'required|max:45',
            'barangay' => 'required|max:45',
            'city' => 'required|max:45',
            'province' => 'required|max:45'
        ];
    }
}
