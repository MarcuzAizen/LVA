<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'code' => ['required', 'string', 'min:4', 'max:25', Rule::unique('subjects')->whereNull('deleted_at')],
            'description' => ['required', 'string', 'min:4'],
            'unit' => ['required', 'integer', 'min:1'],
        ];
    }
}
