<?php

namespace App\Repositories;

use App\Http\Requests\PessoaRequest;
use App\Models\Pessoa;

/**
 * Interface do repositório de Pessoas
 */
interface PessoaRepository
{
    /**
     * Adicionar uma pessoa ao sistema
     *
     * @param PessoaRequest $request
     * @return Pessoa
     */
    public function adicionar(PessoaRequest $request): Pessoa;

    /**
     * Alterar dados da pessoa e endereços
     *
     * @param PessoaRequest $request
     * @return Pessoa
     */
    public function alterar(PessoaRequest $request, Pessoa $pessoa): Pessoa;
}
