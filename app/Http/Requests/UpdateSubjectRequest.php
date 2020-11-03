<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'code' => ['required', 'string', Rule::unique('subjects')->ignore($this->subject)->whereNull('deleted_at')],
            'description' => ['required', 'string', 'max:50'],
            'unit' => ['required', 'integer', 'min:1', 'max:2'],
        ];
    }
}
