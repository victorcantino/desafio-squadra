<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Uf extends BaseModel
{
    use HasFactory;

    protected $table = 'tb_uf';

    protected $primaryKey = 'codigoUf';

    protected $fillable = ['nome', 'sigla', 'status'];

    /**
     * Retorna os municípios relacionados
     *
     * @return HasMany
     */
    public function municipios(): HasMany
    {
        return $this->hasMany(Municipio::class);
    }
}
