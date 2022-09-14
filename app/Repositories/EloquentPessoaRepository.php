<?php

namespace App\Repositories;

use App\Exceptions\Erros;
use App\Http\Requests\PessoaRequest;
use App\Models\Endereco;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

/**
 * Repositório para ser injetado
 */
class EloquentPessoaRepository implements PessoaRepository
{
    /**
     * Adicionar uma pessoa ao sistema
     *
     * @param PessoaRequest $request
     * @return Pessoa
     */
    public function adicionar(PessoaRequest $request): Pessoa
    {
        DB::beginTransaction();
        $pessoa = Pessoa::create($request->all());
        try {
            $enderecos = $request->input('enderecos');
            foreach ($enderecos as &$endereco) {
                $endereco['codigoPessoa'] = $pessoa->codigoPessoa;
            }
            Endereco::insert($enderecos);
        } catch (Erros $th) {
            DB::rollBack();
            throw new Erros('Erro ao criar a pessoa: ' . $th->getMessage(), 503);
        }
        DB::commit();
        return $pessoa;
    }

    /**
     * Alterar dados da Pessoa e seus endereços
     *
     * @param PessoaRequest $request
     * @return Pessoa
     */
    public function alterar(PessoaRequest $request, Pessoa $pessoa): Pessoa
    {
        DB::beginTransaction();
        $pessoa->fill($request->all());
        $pessoa->save();
        try {
            $notIn = [];
            foreach ($request->input('enderecos') as $e) {
                if (isset($e['codigoEndereco'])) { // alterar endereço
                    $endereco = Endereco::firstWhere('codigoEndereco', $e['codigoEndereco']);
                    if ($endereco === null) {
                        throw new Erros('O endereço informado não existe', 503);
                    }
                    $endereco->fill($e)->save();
                    $notIn[] = $endereco->codigoEndereco;
                } else { // endereço novo
                    $notIn[] = Endereco::create($e)->codigoEndereco;
                }
            }
            Endereco::where('codigoPessoa', $pessoa->codigoPessoa)
                ->whereNotIn('codigoEndereco', $notIn)
                ->delete();
        } catch (Erros $th) {
            DB::rollBack();
            throw new Erros('Erro ao alterar a pessoa: ' . $th->getMessage(), 503);
        }
        DB::commit();
        return $pessoa;
    }
}
