<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGuardianRequest extends FormRequest
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
            'student_id' => ['nullable', 'integer', 'min:1'],
            'first_name' => ['required', 'string', 'min:4', 'max:45'],
            'last_name' => ['required', 'string', 'min:4', 'max:45'],
            'suffix' => ['nullable', 'string', 'min:1', 'max:10'],
            'sex' => ['required', 'string', 'min:1', Rule::in(['M', 'F'])],
            'birthdate' => ['required', 'date'],
            'contact_number' => ['required', 'string', 'min:11', 'max:11'],
            'religion' => ['required', 'string', 'min:4', 'max:45'],
            'occupation' => ['required', 'string', 'min:4', 'max:45'],
            'relationship' => ['required', 'string', 'min:4', 'max:45']
        ];
    }
}
