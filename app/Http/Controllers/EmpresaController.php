<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
     
    public function index()
    {
        $empresas = Empresa::all(); 
        return view('empresas.empresaIndex', compact('empresas')); 
    }

    public function create()
    {
        return view('empresas.empresaCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'razao_social' => 'required|string|max:255',
            'nome_fantasia' => 'nullable|string|max:255',
            'cnpj' => 'required|string|size:18|unique:empresas,cnpj',
            'endereco' => 'required|string|max:255',
        ]);

        Empresa::create($request->all());

        return redirect()->route('empresas.index')->with('success', 'Empresa criada com sucesso!');
    }

    public function show(string $id)
    {
        return view('empresas.empresaShow', compact('empresa'));
    }

    public function edit(string $id)
    {
        return view('empresas.empresaEdit', compact('empresa'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'razao_social' => 'required|string|max:255',
            'nome_fantasia' => 'nullable|string|max:255',
            'cnpj' => 'required|string|size:18|unique:empresas,cnpj,' . $empresa->id,
            'endereco' => 'required|string|max:255',
        ]);

        $empresa->update($request->all());

        return redirect()->route('empresas.index')->with('success', 'Empresa atualizada com sucesso!'); 
    }

    public function destroy(string $id)
    {
        $empresa->delete();
        return redirect()->route('empresas.index')->with('success', 'Empresa excluída com sucesso!');
    }
}
