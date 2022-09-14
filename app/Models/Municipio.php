<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipio extends BaseModel
{
    protected $table = 'tb_municipio';

    protected $primaryKey = 'codigoMunicipio';

    protected $guarded = ['codigoMunicipio'];

    /**
     * Retorna a UF relacionada ao município
     *
     * @return BelongsTo
     */
    public function uf(): BelongsTo
    {
        return $this->belongsTo(Uf::class, 'codigoUf', 'codigoMunicipio');
    }

    /**
     * Retorna os bairros relacionados ao município
     *
     * @return HasMany
     */
    public function bairros(): HasMany
    {
        return $this->hasMany(Bairro::class, 'codigoBairro', 'codigoMunicipio');
    }
}
