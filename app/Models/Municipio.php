<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipio extends BaseModel
{
    use HasFactory;

    protected $table = 'tb_municipio';

    protected $primaryKey = 'codigoMunicipio';

    protected $fillable = ['codigoUf', 'nome', 'status'];

    /**
     * Retorna a UF relacionada ao município
     *
     * @return BelongsTo
     */
    public function uf(): BelongsTo
    {
        return $this->belongsTo(Uf::class);
    }

    /**
     * Retorna os bairros relacionados ao município
     *
     * @return HasMany
     */
    public function bairros(): HasMany
    {
        return $this->hasMany(Bairro::class);
    }
}
