<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Aviso;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Painel principal admin
    public function index()
    {
        $totalEventos = Evento::count();
        $totalAvisos  = Aviso::count();
        return view('admin.index', compact('totalEventos', 'totalAvisos'));
    }

    // US006 - Listar eventos no admin
    public function eventos()
    {
        $eventos = Evento::orderBy('data', 'desc')->get();
        return view('admin.eventos.index', compact('eventos'));
    }

    // US006 - Formulário para criar evento
    public function criarEvento()
    {
        return view('admin.eventos.criar');
    }

    // US006 - Salvar novo evento
    public function salvarEvento(Request $request)
    {
        $request->validate([
            'titulo'    => 'required|string|max:255',
            'descricao' => 'required|string',
            'data'      => 'required|date',
            'horario'   => 'nullable|date_format:H:i',
            'local'     => 'nullable|string|max:255',
        ], [
            'titulo.required'    => 'O título é obrigatório.',
            'descricao.required' => 'A descrição é obrigatória.',
            'data.required'      => 'A data é obrigatória.',
            'data.date'          => 'Data inválida.',
        ]);

        Evento::create($request->only('titulo', 'descricao', 'data', 'horario', 'local'));

        return redirect()->route('admin.eventos')->with('sucesso', 'Evento cadastrado com sucesso!');
    }

    // US006 - Formulário para editar evento
    public function editarEvento($id)
    {
        $evento = Evento::findOrFail($id);
        return view('admin.eventos.editar', compact('evento'));
    }

    // US006 - Atualizar evento
    public function atualizarEvento(Request $request, $id)
    {
        $request->validate([
            'titulo'    => 'required|string|max:255',
            'descricao' => 'required|string',
            'data'      => 'required|date',
            'horario'   => 'nullable|date_format:H:i',
            'local'     => 'nullable|string|max:255',
        ]);

        $evento = Evento::findOrFail($id);
        $evento->update($request->only('titulo', 'descricao', 'data', 'horario', 'local'));

        return redirect()->route('admin.eventos')->with('sucesso', 'Evento atualizado com sucesso!');
    }

    // US006 - Excluir evento
    public function excluirEvento($id)
    {
        Evento::findOrFail($id)->delete();
        return redirect()->route('admin.eventos')->with('sucesso', 'Evento removido.');
    }

    // Avisos admin
    public function avisos()
    {
        $avisos = Aviso::latest()->get();
        return view('admin.avisos.index', compact('avisos'));
    }

    public function criarAviso()
    {
        return view('admin.avisos.criar');
    }

    public function salvarAviso(Request $request)
    {
        $request->validate([
            'titulo'   => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        Aviso::create([
            'titulo'    => $request->titulo,
            'conteudo'  => $request->conteudo,
            'destaque'  => $request->has('destaque'),
        ]);

        return redirect()->route('admin.avisos')->with('sucesso', 'Aviso publicado com sucesso!');
    }

    public function excluirAviso($id)
    {
        Aviso::findOrFail($id)->delete();
        return redirect()->route('admin.avisos')->with('sucesso', 'Aviso removido.');
    }
}
