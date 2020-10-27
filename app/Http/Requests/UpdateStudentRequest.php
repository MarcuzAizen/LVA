<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'student_remark_id' => ['nullable', 'integer', 'min:1'],
            'lrn' => [
                'required', 
                'integer', 
                'digits:12', 
                Rule::unique('students')->ignore($this->student)->whereNull('deleted_at')
            ],
            'first_name' => ['required', 'string', 'min:3', 'max:45'],
            'middle_name' => ['nullable', 'string', 'min:3', 'max:45'],
            'last_name' => ['required', 'string', 'min:3', 'max:45'],
            'suffix' => ['nullable', 'string', 'min:1', 'max:10'],
            'sex' => ['required', 'string', 'min:1', 'max:1', Rule::in(['M', 'F'])],
            'birthdate' => ['required', 'date'],
            'mother_tongue' => ['required', 'string', 'min:3', 'max:45'],
            'contact_number' => ['required', 'string', 'min:11', 'max:11'],
            'previous_school' => ['required', 'string', 'min:3', 'max:45'],
            'ethnic' => ['required', 'string', 'min:3', 'max:45'],
            'religion' => ['required', 'string', 'min:3', 'max:45'],
            'purok' => ['required', 'string', 'min:3', 'max:45'],
            'barangay' => ['required', 'string', 'min:3', 'max:45'],
            'city' => ['required', 'string', 'min:3', 'max:45'],
            'province' => ['required', 'string', 'min:3', 'max:45'],
            'username' => [
                'required', 
                'string', 
                'min:4', 
                'max:25',
                Rule::unique('students')->ignore($this->student)->whereNull('deleted_at')
            ],
            'password' => [
                'required', 
                'string', 
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ]
        ];
    }
}
