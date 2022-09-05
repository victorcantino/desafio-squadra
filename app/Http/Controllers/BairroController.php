<?php

namespace App\Http\Controllers;

use App\Exceptions\Erros;
use App\Http\Requests\BairroRequest;
use App\Models\Bairro;
use Illuminate\Http\Request;

class BairroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Bairro::query();
        if ($request->has('codigoMunicipio'))
            $query->where('codigoMunicipio', $request->codigoMunicipio);
        if ($request->has('codigoBairro'))
            $query->where('codigoBairro', $request->codigoBairro);
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
    public function store(BairroRequest $request)
    {
        if (Bairro::create($request->all()))
            return response()->json([
                'mensagem' => 'Bairro criado com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao criar o Bairro', 503);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bairro $bairro)
    {
        if ($bairro->fill($request->all())->save())
            return response()->json([
                'mensagem' => 'Bairro criado com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao criar o Bairro', 503);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $bairro
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $bairro)
    {
        if (Bairro::destroy($bairro))
            return response()->json([
                'mensagem' => 'Bairro removido com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao remover o Bairro', 503);
    }
}
