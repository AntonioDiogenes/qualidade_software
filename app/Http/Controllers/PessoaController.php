<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Empresa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
     
    public function index()
    {
        $pessoas = Pessoa::with('empresa')->get();
        return view('pessoas.pessoaIndex', compact('pessoas'));
    }

     
    public function create()
    {
        $empresas = Empresa::all();
        return view('pessoas.pessoaCreate', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:pessoas,email',
            'telefone' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
            'observacoes' => 'nullable|string',
            'empresa_id' => 'nullable|exists:empresas,id',
        ]);

        Pessoa::create($request->all());

        return redirect()->route('pessoas.index')->with('success', 'Pessoa criada com sucesso!');
    }

    public function show(Pessoa $pessoa)
    {
        $pessoa->load('empresa');
        return view('pessoas.pessoaShow', compact('pessoa'));
    }


    public function edit(Pessoa $pessoa)
    {
        $empresas = Empresa::all();
        return view('pessoas.pessoaEdit', compact('pessoa', 'empresas'));
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:pessoas,email,' . $pessoa->id,
            'telefone' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
            'observacoes' => 'nullable|string',
            'empresa_id' => 'nullable|exists:empresas,id',
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