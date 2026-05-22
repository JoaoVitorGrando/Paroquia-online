<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Aviso;
use App\Models\Grupo;
use App\Models\Missa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Painel principal admin
    public function index()
    {
        $totalEventos = Evento::count();
        $totalAvisos  = Aviso::count();
        $totalGrupos  = Grupo::count();
        $totalMissas  = Missa::count();
        return view('admin.index', compact('totalEventos', 'totalAvisos', 'totalGrupos', 'totalMissas'));
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

    // ========================================
    // US013 - CRUD de Grupos (Sprint 3)
    // ========================================
    public function grupos()
    {
        $grupos = Grupo::withCount('inscritos')->orderBy('nome')->get();
        return view('admin.grupos.index', compact('grupos'));
    }

    public function criarGrupo()
    {
        return view('admin.grupos.criar');
    }

    public function salvarGrupo(Request $request)
    {
        $request->validate([
            'nome'             => 'required|string|max:255',
            'descricao'        => 'required|string',
            'responsavel'      => 'nullable|string|max:255',
            'dia_reuniao'      => 'nullable|string|max:50',
            'horario_reuniao'  => 'nullable|date_format:H:i',
            'local'            => 'nullable|string|max:255',
        ], [
            'nome.required'      => 'O nome do grupo é obrigatório.',
            'descricao.required' => 'A descrição é obrigatória.',
        ]);

        Grupo::create([
            'nome'             => $request->nome,
            'descricao'        => $request->descricao,
            'responsavel'      => $request->responsavel,
            'dia_reuniao'      => $request->dia_reuniao,
            'horario_reuniao'  => $request->horario_reuniao,
            'local'            => $request->local,
            'ativo'            => true,
        ]);

        return redirect()->route('admin.grupos')->with('sucesso', 'Grupo cadastrado com sucesso!');
    }

    public function editarGrupo($id)
    {
        $grupo = Grupo::findOrFail($id);
        return view('admin.grupos.editar', compact('grupo'));
    }

    public function atualizarGrupo(Request $request, $id)
    {
        $request->validate([
            'nome'             => 'required|string|max:255',
            'descricao'        => 'required|string',
            'responsavel'      => 'nullable|string|max:255',
            'dia_reuniao'      => 'nullable|string|max:50',
            'horario_reuniao'  => 'nullable|date_format:H:i',
            'local'            => 'nullable|string|max:255',
        ]);

        $grupo = Grupo::findOrFail($id);
        $grupo->update($request->only(
            'nome', 'descricao', 'responsavel', 'dia_reuniao', 'horario_reuniao', 'local'
        ));

        return redirect()->route('admin.grupos')->with('sucesso', 'Grupo atualizado com sucesso!');
    }

    public function alternarGrupo($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->ativo = ! $grupo->ativo;
        $grupo->save();

        $msg = $grupo->ativo ? 'Grupo ativado.' : 'Grupo desativado.';
        return redirect()->route('admin.grupos')->with('sucesso', $msg);
    }

    public function excluirGrupo($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->inscritos()->detach();
        $grupo->delete();
        return redirect()->route('admin.grupos')->with('sucesso', 'Grupo removido.');
    }

    public function inscritosGrupo($id)
    {
        $grupo = Grupo::with('inscritos')->findOrFail($id);
        return view('admin.grupos.inscritos', compact('grupo'));
    }

    // ========================================
    // US014 - CRUD de Missas (Sprint 3)
    // ========================================
    public function missas()
    {
        $missas = Missa::listarOrdenadas();
        return view('admin.missas.index', compact('missas'));
    }

    public function criarMissa()
    {
        return view('admin.missas.criar');
    }

    public function salvarMissa(Request $request)
    {
        $request->validate([
            'dia_semana' => 'required|in:Segunda-feira,Terça-feira,Quarta-feira,Quinta-feira,Sexta-feira,Sábado,Domingo',
            'horario'    => 'required|date_format:H:i',
            'local'      => 'nullable|string|max:255',
            'observacao' => 'nullable|string|max:255',
        ], [
            'dia_semana.required' => 'Escolha o dia da semana.',
            'dia_semana.in'       => 'Dia da semana inválido.',
            'horario.required'    => 'Informe o horário.',
            'horario.date_format' => 'Horário inválido (use HH:MM).',
        ]);

        Missa::create([
            'dia_semana' => $request->dia_semana,
            'horario'    => $request->horario,
            'local'      => $request->local,
            'observacao' => $request->observacao,
            'ativo'      => true,
        ]);

        return redirect()->route('admin.missas')->with('sucesso', 'Horário de missa cadastrado!');
    }

    public function editarMissa($id)
    {
        $missa = Missa::findOrFail($id);
        return view('admin.missas.editar', compact('missa'));
    }

    public function atualizarMissa(Request $request, $id)
    {
        $request->validate([
            'dia_semana' => 'required|in:Segunda-feira,Terça-feira,Quarta-feira,Quinta-feira,Sexta-feira,Sábado,Domingo',
            'horario'    => 'required|date_format:H:i',
            'local'      => 'nullable|string|max:255',
            'observacao' => 'nullable|string|max:255',
        ]);

        $missa = Missa::findOrFail($id);
        $missa->update($request->only('dia_semana', 'horario', 'local', 'observacao'));

        return redirect()->route('admin.missas')->with('sucesso', 'Horário atualizado.');
    }

    public function alternarMissa($id)
    {
        $missa = Missa::findOrFail($id);
        $missa->ativo = ! $missa->ativo;
        $missa->save();

        $msg = $missa->ativo ? 'Missa ativada.' : 'Missa desativada.';
        return redirect()->route('admin.missas')->with('sucesso', $msg);
    }

    public function excluirMissa($id)
    {
        Missa::findOrFail($id)->delete();
        return redirect()->route('admin.missas')->with('sucesso', 'Horário removido.');
    }
}
