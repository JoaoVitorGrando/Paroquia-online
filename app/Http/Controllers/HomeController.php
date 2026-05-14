<?php

namespace App\Http\Controllers;

use App\Models\Missa;
use App\Models\Evento;
use App\Models\Aviso;

class HomeController extends Controller
{
    public function index()
    {
        $proximosEventos = Evento::where('data', '>=', now()->toDateString())
            ->orderBy('data', 'asc')
            ->take(3)
            ->get();

        $missasDomingo = Missa::where('dia_semana', 'Domingo')
            ->where('ativo', true)
            ->get();

        $avisoDestaque = Aviso::where('destaque', true)
            ->latest()
            ->first();

        return view('home', compact('proximosEventos', 'missasDomingo', 'avisoDestaque'));
    }

    public function sobre()
    {
        return view('sobre');
    }

    public function contato()
    {
        return view('contato.index');
    }

    public function contatoEnviar(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email',
            'assunto'  => 'required|string|max:255',
            'mensagem' => 'required|string',
        ], [
            'nome.required'     => 'Informe seu nome.',
            'email.required'    => 'Informe seu e-mail.',
            'email.email'       => 'E-mail inválido.',
            'assunto.required'  => 'Informe o assunto.',
            'mensagem.required' => 'Escreva sua mensagem.',
        ]);

        // Em produção aqui enviaria o email. Por ora retorna sucesso.
        return back()->with('sucesso', 'Mensagem enviada com sucesso! Entraremos em contato em breve.');
    }
}
