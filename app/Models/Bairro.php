<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bairro extends BaseModel
{
    protected $table = 'tb_bairro';

    protected $primaryKey = 'codigoBairro';

    protected $guarded = ['codigoBairro'];

    /**
     * Retorna o município relacionado ao bairro
     *
     * @return belongsTo
     */
    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'codigoMunicipio', 'codigoBairro');
    }

    /**
     * Retorna os endereços relacionados ao bairro
     *
     * @return hasMany
     */
    public function enderecos(): HasMany
    {
        return $this->hasMany(Endereco::class, 'codigoEndereco', 'codigoBairro');
    }
}
