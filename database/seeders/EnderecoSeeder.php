<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Endereco::create([
            'rua'    => 'Rua Santa Fernanda',
            'bairro' => 'Jatiúca',
            'estado' => 'Alagoas',
            'cidade' => 'Maceió'
        ]);
    }
}
