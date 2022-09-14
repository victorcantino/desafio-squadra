<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Pessoa extends BaseModel
{
    protected $table = 'tb_pessoa';

    protected $primaryKey = 'codigoPessoa';

    protected $guarded = ['codigoPessoa'];

    /**
     * Get all of the enderecos for the Pessoa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enderecos(): HasMany
    {
        return $this->hasMany(Endereco::class, 'codigoEndereco', 'codigoPessoa');
    }
}
