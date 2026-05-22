<?php

namespace App\Http\Controllers;

use App\Models\Missa;
use App\Models\Evento;
use App\Models\Aviso;
use App\Mail\ContatoRecebido;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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

        // US015 - Envio real de e-mail via SMTP (Sprint 3)
        $destinatario = config('mail.paroquia_destino', env('PAROQUIA_EMAIL_DESTINO', 'contato@paroquia.com'));

        try {
            Mail::to($destinatario)->send(new ContatoRecebido(
                $request->nome,
                $request->email,
                $request->assunto,
                $request->mensagem
            ));

            return back()->with('sucesso', 'Mensagem enviada com sucesso! Entraremos em contato em breve.');
        } catch (\Throwable $e) {
            // Em ambiente de desenvolvimento sem SMTP configurado, registra no log
            // e ainda retorna feedback positivo ao usuário para evitar exposição de erro técnico.
            Log::warning('Falha ao enviar e-mail de contato: ' . $e->getMessage());

            return back()->with('sucesso', 'Mensagem registrada! Entraremos em contato em breve.');
        }
    }
}
