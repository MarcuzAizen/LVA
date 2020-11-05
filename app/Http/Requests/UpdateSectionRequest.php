<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'track_id'=> ['nullable', 'integer', 'min:1'],
            'name' => ['required', 'string', 'min:3', 'max:45'],
            'capacity' => ['required', 'integer', 'min:1', 'max:50'],
        ];
    }
}
