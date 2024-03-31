<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimbangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'jeniskelamin' => 'required',
            'umur' => 'required',

            'pb' => 'required',
            'bb' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Silahkan isi Nama Bayi',
            'jeniskelamin.required' => 'Silahkan isi Jenis Kelamin Bayi',
            'umur.required' => 'Silahkan isi Umur Bayi',

            'pb.required' => 'Data Panjang Badan belum ada',
            'bb.required' => 'Data Berat Badan belum ada',
        ];
    }
}
