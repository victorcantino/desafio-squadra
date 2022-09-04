<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bairro extends BaseModel
{
    use HasFactory;

    protected $table = 'tb_bairro';

    protected $primaryKey = 'codigoBairro';

    public $timestamps = false;

    protected $fillable = ['codigoMunicipio', 'nome', 'status'];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }
}
