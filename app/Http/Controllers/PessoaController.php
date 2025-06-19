<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
     
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.pessoaIndex', compact('pessoas'));
    }

     
    public function create()
    {
        return view('pessoas.pessoaCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:pessoas,email',
            'telefone' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
            'observacoes' => 'nullable|string',
        ]);

        Pessoa::create($request->all());

        return redirect()->route('pessoas.index')->with('success', 'Pessoa criada com sucesso!');
    }

    public function show(Pessoa $pessoa)
    {
        return view('pessoas.pessoaShow', compact('pessoa'));
    }

    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.pessoaEdit', compact('pessoa'));
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:pessoas,email,' . $pessoa->id,
            'telefone' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
            'observacoes' => 'nullable|string',
        ]);

        $pessoa->update($request->all());

        return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return redirect()->route('pessoas.index')->with('success', 'Pessoa excluída com sucesso!');
    }
}