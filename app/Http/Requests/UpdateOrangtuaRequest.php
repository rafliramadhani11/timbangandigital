<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrangtuaRequest extends FormRequest
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
            'region_id' => 'required|string',   //Dropdown

            'name' => 'required|string|max:255',
            'type' => 'required|string',    //Dropdown

            'jeniskelamin' => 'required|string',    //DropDown
            'nohp' => 'required|string|max:13',
            'tgllahir' => 'required|date',
            'pekerjaan' => 'required|string|max:50',

            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'alamat' => 'required|string'
        ];
    }
}
