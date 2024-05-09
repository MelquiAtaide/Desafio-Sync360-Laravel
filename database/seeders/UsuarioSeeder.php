<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $endereco = Endereco::first();
        Usuario::create([
            'img_perfil'      => '57f4d2bcb6f8bbfe1ea1462cd30f1d9b.jpg',
            'nome'            => 'Melquisedeque de Moura Ataide',
            'data_nascimento' => '2000-08-07',
            'endereco_id'     => $endereco->id,
            'biografia'       => 'Desenvolvedor Web de PHP-Laravel',
        ]);
    }
}
