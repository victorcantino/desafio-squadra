<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Uf extends BaseModel
{
    use HasFactory;

    /**
     * Tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'tb_uf';

    /**
     * Chave primária associada à tabela
     *
     * @var string
     */
    protected $primaryKey = 'codigo_uf';

    /**
     * Indica se o model deve salvar datas de criação e alteração
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Atributos que não são inseridos em massa.
     *
     * @var array
     */
    protected $fillable = ['nome', 'sigla', 'status'];

}
