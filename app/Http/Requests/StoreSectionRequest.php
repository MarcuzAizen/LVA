<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'track_id'=> ['required', 'integer', 'min:1'],
            'name' => ['required', 'string', 'min:3', 'max:45'],
            'capacity' => ['required', 'integer', 'min:1', 'max:50'],
        ];
    }

    public function messages()
    {
        return [
            'track_id.required' => 'The grade_level and track field is required'
        ];
    }
}
