<?php

namespace App\Http\Controllers;

use App\Exceptions\Erros;
use App\Http\Requests\PessoaRequest;
use App\Models\Pessoa;
use App\Repositories\PessoaRepository;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function __construct(private PessoaRepository $repository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Pessoa::query();
        if ($request->has('codigoPessoa'))
            $query->where('codigoPessoa', $request->codigoPessoa);
        if ($request->has('login'))
            $query->where('login', $request->login);
        if ($request->has('status'))
            $query->where('status', $request->status);
        return $query->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaRequest $request)
    {
        if (Pessoa::create($request->all()))
            return response()->json([
                'mensagem' => 'Pessoa criada com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao criar a Pessoa', 503);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaRequest $request, Pessoa $pessoa)
    {
        if ($pessoa->fill($request->all())->save())
            return response()->json([
                'mensagem' => 'Pessoa criado com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao criar o Pessoa', 503);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $pessoa)
    {
        if (Pessoa::destroy($pessoa))
            return response()->json([
                'mensagem' => 'Pessoa removida com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao remover a Pessoa', 503);
    }
}
