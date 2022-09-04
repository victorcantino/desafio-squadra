<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends BaseModel
{
    use HasFactory;

    protected $table = 'tb_pessoa';

    protected $primaryKey = 'codigoPessoa';

    public $timestamps = false;

    protected $fillable = ['nome', 'sobrenome', 'idade', 'login', 'senha', 'status'];

    public function enderecos()
    {
        // return $this->hasMany(Endereco::class);
    }
}
