<?php

namespace App\Http\Controllers;

use App\Exceptions\Erros;
use App\Http\Requests\UfUpdateRequest;
use App\Http\Requests\UfStoreRequest;
use App\Models\Uf;
use Illuminate\Http\Request;
use Throwable;

class UfController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Uf::query();
            if ($request->has('codigoUf'))
                $query->where('codigoUf', $request->codigoUf);
            if ($request->has('nome'))
                $query->where('nome', $request->nome);
            if ($request->has('sigla'))
                $query->where('sigla', $request->sigla);
            return $query->get();
        } catch (Throwable $th) {
            throw new Erros('Não foi possível pesquisar a UF.', 503);
        }
    }

    public function store(UfStoreRequest $request)
    {
        try {
            if (Uf::create($request->all()))
                return response()->json([
                    'mensagem' => 'UF cadastrada com sucesso.',
                ], 200);
        } catch (Throwable $th) {
            throw new Erros('Não foi possível cadastrar a UF.', 503);
        }
    }

    public function update(UfUpdateRequest $request, Uf $uf)
    {
        try {
            if ($uf->fill($request->all())->save())
                return $uf->all();
        } catch (Throwable $th) {
            throw new Erros('Não foi possível alterar a UF.', 503);
        }
    }

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
