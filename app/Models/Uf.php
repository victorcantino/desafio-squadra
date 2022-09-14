<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Uf extends BaseModel
{
    protected $table = 'tb_uf';

    protected $primaryKey = 'codigoUf';

    protected $guarded = ['codigoUf'];

    /**
     * Retorna os municípios relacionados
     *
     * @return HasMany
     */
    public function municipios(): HasMany
    {
        return $this->hasMany(Municipio::class, 'codigoMunicipio', 'codigoUf');
    }
}
