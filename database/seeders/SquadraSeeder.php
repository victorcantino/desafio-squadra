<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SquadraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_uf')->insert([
            'codigoUf' => 1,
            'sigla' => 'RJ',
            'nome' => 'Rio de Janeiro',
            'status' => 2,
        ]);
        DB::table('tb_municipio')->insert([
            'codigoMunicipio' => 1,
            'codigoUf' => 1,
            'nome' => 'Rio de Janeiro',
            'status' => 2,
        ]);
        DB::table('tb_bairro')->insert([
            'codigoBairro' => 1,
            'codigoMunicipio' => 1,
            'nome' => 'Nogueira',
            'status' => 2,
        ]);
    }
}
