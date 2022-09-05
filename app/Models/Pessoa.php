<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pessoa extends BaseModel
{
    use HasFactory;

    protected $table = 'tb_pessoa';

    protected $primaryKey = 'codigoPessoa';

    protected $fillable = ['nome', 'sobrenome', 'idade', 'login', 'senha', 'status'];

    /**
     * Retorna os endereços relacionados à Pessoa
     *
     * @return HasMany
     */
    public function enderecos(): HasMany
    {
        return $this->hasMany(Endereco::class);
    }
}
