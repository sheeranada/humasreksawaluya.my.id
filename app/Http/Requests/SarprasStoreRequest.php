<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SarprasStoreRequest extends FormRequest
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
            'px_rajal_id' => ['required', 'exists:px_rajal,id'],
            'sarana' => ['required', 'max:255', 'string'],
            'prasarana' => ['required', 'max:255', 'string'],
            'fasilitas_lain' => ['required', 'max:255', 'string'],
        ];
    }
}
