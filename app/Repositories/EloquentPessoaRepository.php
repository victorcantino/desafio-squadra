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
                $endereco['codigo_pessoa'] = $pessoa->codigo_pessoa;
            }
            Endereco::insert($enderecos);
            return $pessoa;
        });
    }
    public function alterar(PessoaRequest $request): Pessoa
    {
        return DB::transaction(function () use ($request) {
            $pessoa = Pessoa::where($request->codigo_pessoa)->first();
            $pessoa->fill($request->all());
            $pessoa->save();
            
            $notIn = [];
            $enderecos = $request->input('enderecos');
            foreach ($enderecos as &$endereco) {
                if (isset($endereco['codigo_endereco'])){ // endereço já existe
                    array_push($notIn, $endereco['codigo_endereco']);
                    
                    $alterado = Endereco::where('codigo_endereco', $endereco['codigo_endereco'])->first();
                    $alterado->nome_rua = $endereco['nome_rua'];
                    $alterado->numero = $endereco['numero'];
                    $alterado->complemento = $endereco['complemento'];
                    $alterado->cep = $endereco['cep'];
                    $alterado->save();
                }
                else { // novo endereço
                    $novo = new Endereco();
                    $novo->codigo_pessoa = $pessoa->codigo_pessoa;
                    $novo->codigo_bairro = $endereco['codigo_bairro'];
                    $novo->nome_rua = $endereco['nome_rua'];
                    $novo->numero = $endereco['numero'];
                    $novo->complemento = $endereco['complemento'];
                    $novo->cep = $endereco['cep'];
                    $novo->save();
                    array_push($notIn, $novo->codigo_endereco);
                }
            }
            Endereco::where('codigo_pessoa', $pessoa->codigo_pessoa)
                ->whereNotIn('codigo_endereco', $notIn)->delete();

            return $pessoa;
        });
    }
}
