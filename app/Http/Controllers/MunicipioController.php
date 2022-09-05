<?php

namespace App\Http\Controllers;

use App\Exceptions\Erros;
use App\Http\Requests\MunicipioRequest;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Retorna a lista de municípios.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Municipio::query();
        if ($request->has('codigoUf'))
            $query->where('codigoUf', $request->codigoUf);
        if ($request->has('codigoMunicipio'))
            $query->where('codigoMunicipio', $request->codigoMunicipio);
        if ($request->has('nome'))
            $query->where('nome', $request->nome);
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
    public function store(MunicipioRequest $request)
    {
        if (Municipio::create($request->all()))
            return response()->json([
                'mensagem' => 'Município criado com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao criar o Município', 503);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(MunicipioRequest $request, Municipio $municipio)
    {
        if ($municipio->fill($request->all())->save())
            return response()->json([
                'mensagem' => 'Município atualizado com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao atualizar o Município', 503);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $municipio)
    {
        if (Municipio::destroy($municipio))
            return response()->json([
                'mensagem' => 'Município removido com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao remover o Município', 503);
    }
}
