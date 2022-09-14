<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends BaseModel
{
    protected $table = 'tb_endereco';

    protected $primaryKey = 'codigoEndereco';

    protected $guarded = ['codigoEndereco'];

    /**
     * Get the pessoa that owns the Endereco
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'codigoPessoa', 'codigoEndereco');
    }
}
