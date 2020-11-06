<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnrollRequest extends FormRequest
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
            'registrar_id' => ['required', 'integer', 'min:1'],
            'student_id' => ['required', 'integer', 'min:1'],
            'acad_year_id' => ['required', 'integer', 'min:1'],
            'section_id' => ['required', 'integer', 'min:1']
        ];
    }
}
