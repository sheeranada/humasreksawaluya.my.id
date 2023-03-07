<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PxRajalStoreRequest extends FormRequest
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
            'no_upf' => ['required', 'numeric'],
            'no_rm' => ['required', 'numeric'],
            'nama_pasien' => ['required', 'max:255', 'string'],
            'klinik' => ['required', 'max:255', 'string'],
            'penjamin' => ['required', 'max:255', 'string'],
            'no_hp' => ['required', 'max:255', 'string'],
            'tgl_daftar' => ['required', 'date'],
            'kategori_pasien' => ['required', 'max:255', 'string'],
        ];
    }
}
