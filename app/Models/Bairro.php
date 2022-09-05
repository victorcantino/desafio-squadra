<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bairro extends BaseModel
{
    use HasFactory;

    protected $table = 'tb_bairro';

    protected $primaryKey = 'codigoBairro';

    protected $fillable = ['codigoMunicipio', 'nome', 'status'];

    /**
     * Retorna o município relacionado ao bairro
     *
     * @return belongsTo
     */
    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class);
    }

    /**
     * Retorna os endereços relacionados ao bairro
     *
     * @return hasMany
     */
    public function enderecos(): HasMany
    {
        return $this->hasMany(Endereco::class);
    }
}
