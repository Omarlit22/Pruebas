<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAulaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'min:5', 'max:10'],
            'capacidad' => 'required|integer',
            'data' => 'required|in:true,false',
            'tipo_aula' => 'required',
            'pizarra' => 'required|in:true,false',
            'imagen' => 'required',
            'wifi' => 'required|in:true,false', 
        ];
    }

}
