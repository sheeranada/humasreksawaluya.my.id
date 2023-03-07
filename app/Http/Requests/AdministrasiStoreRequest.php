<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministrasiStoreRequest extends FormRequest
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
            'pendaftaran' => ['required', 'max:255', 'string'],
            'kasir' => ['required', 'max:255', 'string'],
        ];
    }
}
