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
        $where = [];
        if ($request->input('codigo_bairro')) {
            array_push($where, [
                'codigo_bairro', '=', $request->input('codigo_bairro'),
            ]);
        }
        if ($request->input('codigo_municipio')) {
            array_push($where, [
                'codigo_municipio', '=', $request->input('codigo_municipio'),
            ]);
        }
        if ($request->input('nome')) {
            array_push($where, [
                'nome', '=', $request->input('nome'),
            ]);
        }
        return Bairro::where($where)->get();
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
