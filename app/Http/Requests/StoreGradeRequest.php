<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'enroll_id'=> ['required', 'integer', 'min:1'],
            'schedule_id'=> ['required', 'integer', 'min:1'],
            'mark' => ['required', 'integer', 'min:1', 'max:4'],
            'quarter_sem' => ['required', 'integer', 'min:1', 'max:4'],
        ];
    }
}
