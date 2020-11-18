<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'schedule_id'=> ['required', 'integer', 'min:1'],
            'remarks' => ['required', 'string', 'min:4'],
        ];
    }
}
