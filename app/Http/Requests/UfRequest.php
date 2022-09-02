<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UfRequest extends FormRequest
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
            'sigla.required' => 'A sigla é obrigatória',
            'sigla.unique' => 'Não foi possível cadastrar, pois já existe um registro de UF com a mesma sigla.',
            'sigla.max' => 'A sigla só pode ter :max caracteres',
            'nome.required' => 'O nome é obrigatório',
            'nome.unique' => 'O nome já existe em outro registro',
            'nome.max' => 'O nome só pode ter :max caracteres',
        ];
    }
}
