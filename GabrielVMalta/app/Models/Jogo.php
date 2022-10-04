<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $table = 'jogos';
    protected $primaryKey = 'id_jogo';
    protected $fillable = ['nome', 'descricao', 'capa', 'preco', 'desenvolvedora'];
}
