<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'tb_endereco';

    protected $primaryKey = 'codigoEndereco';

    protected $fillable = ['codigoPessoa', 'codigoBairro', 'nomeRua', 'numero', 'complemento', 'cep'];

    public $timestamps = false;
}
