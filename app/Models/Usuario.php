<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_perfil',
        'nome',
        'data_nascimento',
        'endereco_id',
        'biografia',
    ];

    public function endereco(){
        return $this->belongsTo(Endereco::class, 'endereco_id', 'id');
    }
}
