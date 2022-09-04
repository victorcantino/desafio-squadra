<?php

namespace App\Http\Controllers;

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

        try {
            return $query->get();
        } catch (\Throwable $th) {
            return response()->json([
                'mensagem' => "Não foi possível pesquisar o Município.",
                'status' => "503",
            ], 503);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipioRequest $request)
    {
        $municipio = new Municipio();
        $municipio->fill($request->all());
        return response()->json($municipio->save());
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
        // return $request->all();
        $municipio->fill($request->all());
        return response()->json($municipio->save());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipio $municipio)
    {
        //
    }
}
