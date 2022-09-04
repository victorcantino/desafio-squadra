<?php

namespace App\Http\Controllers;

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
    public function store(BairroRequest $request)
    {
        return response()->json(Bairro::create($request->all()));
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
        $bairro->fill($request->all());
        return response()->json($bairro->save());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bairro  $bairro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bairro $bairro)
    {
        //
    }
}
