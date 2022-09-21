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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required','max:190'],
            'sobrenome' => ['required','max:190'],
            'telefone' => ['max:20'],
            'email' => ['required','max:190', 'email']
        ];
    }

    public function messages()
    {
        return [
            'modelo_id.required' => 'O modelo é obrigatório',
            'data_comprovante.required' => 'A data do comprovante é obrigatória',
            'data_comprovante.date_format' => 'Formato da data do comprovante inválida',
            'hora_comprovante.date_format' => 'Formato da hora do comprovante inválida',
            'hora_comprovante.required' => 'A hora do comprovante é obrigatória',
        ];
    }
}
