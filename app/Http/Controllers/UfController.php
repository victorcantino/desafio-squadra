<?php

namespace App\Http\Controllers;

use App\Exceptions\Erros;
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
        return $query->get();
    }

    /**
     * Cria um registro em Uf.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UfRequest $request)
    {
        if (Uf::create($request->all()))
            return response()->json([
                'mensagem' => 'UF criada com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao criar a UF', 503);
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
        if ($uf->fill($request->all())->save())
            return response()->json([
                'mensagem' => 'UF atualizada com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao atualizar a UF', 503);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uf.id  $uf
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $uf)
    {
        if (Uf::destroy($uf))
            return response()->json([
                'mensagem' => 'UF excluída com sucesso',
                'status' => 200,
            ], 200);
        throw new Erros('Erro ao excluir a UF', 503);
    }
}
