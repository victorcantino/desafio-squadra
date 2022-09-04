<?php

namespace App\Http\Controllers;

use App\Http\Requests\UfRequest;
use App\Models\Uf;
use Illuminate\Http\Request;

class UfController extends Controller
{
    /**
     * Exibe a lista de Ufs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Uf::query();
        if ($request->has('codigoUf'))
            $query->where('codigoUf', $request->codigoUf);
        if ($request->has('nome'))
            $query->where('nome', $request->nome);
        if ($request->has('sigla'))
            $query->where('sigla', $request->sigla);

        try {
            return $query->get();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Não foi possível pesquisar a UF.',
                'status' => 503,
            ], 503);
        }
    }

    /**
     * Cria um registro em Uf.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UfRequest $request)
    {

        return response()->json(Uf::create($request->all()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function update(UfRequest $request, Uf $uf)
    {
        $uf->fill($request->all());
        $uf->save();
        return $uf;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uf.id  $uf
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $uf)
    {
        //
    }
}
