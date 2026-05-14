<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Missa extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia_semana',
        'horario',
        'local',
        'observacao',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];
}
