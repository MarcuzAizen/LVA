<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'schedule_id'=> ['required', 'integer', 'min:1'],
            'remarks' => ['required', 'string', Rule::in(['present', 'late', 'absent'])],
        ];
    }
}
