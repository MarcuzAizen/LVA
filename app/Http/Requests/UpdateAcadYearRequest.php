<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcadYearRequest extends FormRequest
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
            'start' => ['required', 'before:end', Rule::unique('acad_years')->ignore($this->acad_year)->where('end', $this->end)->whereNull('deleted_at')],
            'end' => ['required', 'after:start',Rule::unique('acad_years')->ignore($this->acad_year)->where('start', $this->start)->whereNull('deleted_at')],
        ];
    }
}
