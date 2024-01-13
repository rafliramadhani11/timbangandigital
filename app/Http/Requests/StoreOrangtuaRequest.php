<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrangtuaRequest extends FormRequest
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

            'username' => 'required|string|min:3|max:10|unique:users',
            'password' => 'required|string|min:3',
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:Ayah,Ibu,Wali',    //Dropdown

            'jeniskelamin' => 'required|string|in:Laki Laki,Wanita',    //DropDown
            'nohp' => 'required|string|max:13',
            'tgllahir' => 'required|date',
            'pekerjaan' => 'required|string|max:35',

            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'alamat' => 'required|string'
        ];
    }
}
