<?php

namespace App\Http\Controllers;

use App\Models\Missa;
use Illuminate\Http\Request;

class MissaController extends Controller
{
    // US001 - Exibir horários de missas
    public function index()
    {
        $ordem = [
            'Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira',
            'Quinta-feira', 'Sexta-feira', 'Sábado',
        ];

        $missas = Missa::where('ativo', true)->get()->sortBy(function ($missa) use ($ordem) {
            return array_search($missa->dia_semana, $ordem);
        })->values();

        return view('missas.index', compact('missas'));
    }
}
