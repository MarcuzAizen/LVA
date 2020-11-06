<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProspectusRequest extends FormRequest
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

    public function rules()
    {
        return [
            'track_id'=> ['required', 'integer', 'min:1'],
            'subject_id'=> ['required', 'integer', 'min:1'],
            'sem_to_offer' => ['required', 'integer', 'min:1', 'max:50'],
        ];
    }
}
