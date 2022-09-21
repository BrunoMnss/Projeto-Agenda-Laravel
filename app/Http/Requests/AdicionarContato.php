<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdicionarContato extends FormRequest
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
     * Prepara os campos antes de criar as regras
     */
    public function prepareForValidation()
    {
        /**
         * Adiciona o user_id no request
         */
        $data = [
            'user_id' => auth()->user()->id
        ];

        return $this->request->add($data);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        
        return [
            'user_id' => ['required'],
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
