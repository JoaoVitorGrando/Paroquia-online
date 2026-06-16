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

    public static function listarOrdenadas()
    {
        $ordem = [
            'Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira',
            'Quinta-feira', 'Sexta-feira', 'Sábado',
        ];

        return static::query()
            ->get()
            ->sortBy(function ($missa) use ($ordem) {
                $dia = array_search($missa->dia_semana, $ordem);

                return ($dia !== false ? $dia : 99) . $missa->horario;
            })
            ->values();
    }
}
