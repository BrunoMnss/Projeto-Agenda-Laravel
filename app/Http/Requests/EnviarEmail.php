<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnviarEmail extends FormRequest
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
            'contato_id' => ['required'],
            'email' => ['required', 'max:190', 'email'],
            'mensagem' =>['required', 'max:500']
        ];
    }

    public function messages()
    {
        return [
            'mensagem.required' => 'O email é obrigatório',
        ];
    }
}
