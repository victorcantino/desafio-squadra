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

    protected $fillable = ['nome', 'sigla', 'status'];

    /**
     * Retorna o bairro relacionado ao endereço
     *
     * @return belongsTo
     */
    public function bairro(): BelongsTo
    {
        return $this->belongsTo(Bairro::class);
    }

    /**
     * Retorna a pessoa relacionada ao endereço
     *
     * @return BelongsTo
     */
    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class);
    }
}
