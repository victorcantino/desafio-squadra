<?php

namespace App\Repositories;

use App\Http\Requests\PessoaRequest;
use App\Models\Pessoa;

interface PessoaRepository
{
    public function adicionar(PessoaRequest $request): Pessoa;
    public function alterar(PessoaRequest $request): Pessoa;
}