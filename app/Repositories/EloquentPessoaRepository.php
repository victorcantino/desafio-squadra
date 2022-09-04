<?php

namespace App\Repositories;

use App\Http\Requests\PessoaRequest;
use App\Models\Endereco;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

class EloquentPessoaRepository implements PessoaRepository
{
    public function adicionar(PessoaRequest $request): Pessoa
    {
        return DB::transaction(function () use ($request) {
            $pessoa = Pessoa::create($request->all());

            $enderecos = $request->input('enderecos');
            foreach ($enderecos as &$endereco) {
                $endereco['codigoPessoa'] = $pessoa->codigoPessoa;
            }
            Endereco::insert($enderecos);
            return $pessoa;
        });
    }
    public function alterar(PessoaRequest $request): Pessoa
    {
        return DB::transaction(function () use ($request) {
            $pessoa = Pessoa::where($request->codigoPessoa)->first();
            $pessoa->fill($request->all());
            $pessoa->save();

            $notIn = [];
            $enderecos = $request->input('enderecos');
            foreach ($enderecos as &$endereco) {
                if (isset($endereco['codigoEndereco'])){ // endereço já existe
                    array_push($notIn, $endereco['codigoEndereco']);

                    $alterado = Endereco::where('codigoEndereco', $endereco['codigoEndereco'])->first();
                    $alterado->nomeRua = $endereco['nomeRua'];
                    $alterado->numero = $endereco['numero'];
                    $alterado->complemento = $endereco['complemento'];
                    $alterado->cep = $endereco['cep'];
                    $alterado->save();
                }
                else { // novo endereço
                    $novo = new Endereco();
                    $novo->codigoPessoa = $pessoa->codigoPessoa;
                    $novo->codigoBairro = $endereco['codigoBairro'];
                    $novo->nomeRua = $endereco['nomeRua'];
                    $novo->numero = $endereco['numero'];
                    $novo->complemento = $endereco['complemento'];
                    $novo->cep = $endereco['cep'];
                    $novo->save();
                    array_push($notIn, $novo->codigoEndereco);
                }
            }
            Endereco::where('codigoPessoa', $pessoa->codigoPessoa)
                ->whereNotIn('codigoEndereco', $notIn)->delete();

            return $pessoa;
        });
    }
}
