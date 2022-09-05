<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MunicipioRequest extends FormRequest
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
            'nome' => [
                'required',
                Rule::unique('tb_municipio')->where(fn ($query) => $query->where('codigoUf', $this->codigoUf)),
                'max:256',
            ],
            'codigoUf' => [
                'required',
                Rule::exists('tb_uf')->where('codigoUf', $this->codigoUf),
            ]
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome do Município é obrigatório',
            'nome.unique' => 'O nome do Município já existe nesta UF',
            'nome.max' => 'O nome do Município só pode ter :max caracteres',
            'codigoUf.required' => 'É necessário informar uma UF',
            'codigoUf.exists' => 'A UF informada não existe',
        ];
    }
}
