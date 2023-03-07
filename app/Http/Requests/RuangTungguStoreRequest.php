<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuangTungguStoreRequest extends FormRequest
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
            'kenyamanan' => ['required', 'max:255', 'string'],
            'kebersihan' => ['required', 'max:255', 'string'],
            'saran_kritik' => ['required', 'max:255', 'string'],
        ];
    }
}
