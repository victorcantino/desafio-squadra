<?php

namespace App\Http\Controllers;

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

        try {
            return $query->get();
        } catch (\Throwable $th) {
            return response()->json([
                'mensagem' => 'Não foi possível pesquisar a Pessoa.',
                'status' => 503
            ], 503);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaRequest $request)
    {
        return response()->json($this->repository->adicionar($request));
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
        return response()->json($this->repository->alterar($request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        //
    }
}
