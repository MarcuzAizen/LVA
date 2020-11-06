<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrackRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:45'],
            'description' => ['required', 'string'],
            'grade_level' => ['required', 'integer', 'min:7', 'max:12'],
        ];
    }
}
