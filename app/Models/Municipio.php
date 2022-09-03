<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Municipio extends BaseModel
{
    use HasFactory;
    
    protected $table = 'tb_municipio';

    protected $primaryKey = 'codigo_municipio';

    public $timestamps = false;

    protected $fillable = ['codigo_uf', 'nome', 'status'];
    
    public function uf()
    {
        return $this->belongsTo(Uf::class);
    }
    
    public function bairros()
    {
        return $this->hasMany(Bairro::class);
    }
}
