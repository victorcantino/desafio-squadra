<?php

namespace App\Exceptions;

use Exception;

/**
 * Casse criada para tratar as exceções gerais da API
 */
class Erros extends Exception
{
    /**
     * Construtor da mensagem de erro genérica
     *
     * @param string $mensagem
     * @param integer $status
     */
    public function __construct(string $mensagem, protected int $status)
    {
        $this->message = $mensagem;
    }
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'mensagem' => $this->message,
            'status' => $this->status,
        ], $this->status);
    }
}
