<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PessoaRequest extends FormRequest
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
                'max:256',
            ],
            'sobrenome' => [
                'required',
                'max:256',
            ],
            'idade' => [
                'required',
            ],
            'login' => [
                'required',
                Rule::unique('tb_pessoa')->ignore($this->route('pessoa')),
                'max:50',
            ],
            'senha' => [
                'required',
                'max:50',
            ],
            'enderecos' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'O nome só pode ter :max caracteres',
            'sobrenome.required' => 'O sobrenome é obrigatório',
            'sobrenome.max' => 'O sobrenome só pode ter :max caracteres',
            'idade.required' => 'A idade é obrigatória',
            'login.required' => 'O login é obrigatória',
            'login.max' => 'O login só pode ter :max caracteres',
            'login.unique' => 'Já existe uma pessoa com este login',
            'senha.required' => 'A senha é obrigatória',
            'senha.max' => 'A senha só pode ter :max caracteres',
            'enderecos.required' => 'É necessário informar um endereço',
        ];
    }
}
