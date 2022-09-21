<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarContato extends FormRequest
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
            'nome' => ['required', 'max:190'],
            'sobrenome' => ['required', 'max:190'],
            'telefone' => ['max:20'],
            'email' => ['required', 'max:190', 'email']
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'sobrenome.required' => 'O sobrenome é obrigatório',
            'email.required' => 'O email é obrigatório',
        ];
    }
}
