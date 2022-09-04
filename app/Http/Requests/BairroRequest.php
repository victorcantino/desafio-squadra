<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BairroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'codigoMunicipio' => [
                'required',
            ],
            'nome' => [
                'required',
                'max:256',
                Rule::unique('tb_bairro')->where(fn ($query) => $query->where('codigoMunicipio', $this->codigoMunicipio)),
            ],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do Bairro é obrigatório',
            'nome.unique' => 'O nome do Bairro já existe neste Município',
            'nome.max' => 'O nome do Bairro só pode ter :max caracteres',
            'codigoMunicipio.required' => 'É necessário informar um Município',
        ];
    }
}
