<?php

namespace App\Exceptions;

use Exception;

class Erros extends Exception
{
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
