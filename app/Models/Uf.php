<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Uf extends BaseModel
{
    use HasFactory;

    protected $table = 'tb_uf';

    protected $primaryKey = 'codigo_uf';

    public $timestamps = false;

    protected $fillable = ['nome', 'sigla', 'status'];

    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }
}
