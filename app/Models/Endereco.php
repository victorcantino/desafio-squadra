<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'tb_endereco';

    protected $primaryKey = 'codigoEndereco';

    public $timestamps = false;

    protected $fillable = ['nome', 'sigla', 'status'];

    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }

}
