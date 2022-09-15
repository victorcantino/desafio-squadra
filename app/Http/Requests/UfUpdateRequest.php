<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UfUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'sigla' => [
                'required',
                Rule::unique('tb_uf')->ignore($this->route('uf')),
                'max:3',
            ],
            'nome' => [
                'required',
                Rule::unique('tb_uf')->ignore($this->route('uf')),
                'max:60',
            ],
        ];
    }

    public function messages()
    {
        return [
            'sigla.unique' => 'Não foi possível alterar, pois já existe um registro de UF com a mesma sigla cadastrada.',
            // 'sigla.required' => 'A sigla é obrigatória',
            // 'sigla.max' => 'A sigla só pode ter :max caracteres',
            // 'nome.required' => 'O nome é obrigatório',
            // 'nome.unique' => 'O nome já existe em outro registro',
            // 'nome.max' => 'O nome só pode ter :max caracteres',
        ];
    }
}
