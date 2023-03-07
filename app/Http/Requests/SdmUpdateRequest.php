<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SdmUpdateRequest extends FormRequest
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
            'parkir' => ['required', 'max:255', 'string'],
            'security' => ['required', 'max:255', 'string'],
            'dokter' => ['required', 'max:255', 'string'],
            'perawat' => ['required', 'max:255', 'string'],
            'radiologi' => ['required', 'max:255', 'string'],
            'laboratorium' => ['required', 'max:255', 'string'],
        ];
    }
}
