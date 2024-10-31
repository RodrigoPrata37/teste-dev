<?php

namespace App\Http\Controllers;

use App\Models\Contatos;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $contatos = Contatos::when($search, function($query) use($search) {
        return $query->where('name', 'like', '%' . $search . '%');
    })->paginate(10);

    return view('contatos.index', compact('contatos', 'search'));
}

    public function create()
    {
        return view('contatos.create');
    }

    public function store(Request $request)
    {
        $request ->validate([
            'name'=> 'required|string|max:255',
            'telefone'=> 'required|string|max:15',
            'idade'=> 'required|integer',
            'rua' => 'required|string|max:255',
            'numero' => 'required|integer',
            'cep' => 'required|string|max:10',
            'complement' => 'nullable|string|max:255',
            'estado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);

        Contatos::create($request->all());
        return redirect()->route('contatos.index')->with('success', 'Contato Criado com sucesso');
    }

    public function edit($id)
    {
        $contatos = Contatos::findOrFail($id); 
        return view('contatos.edit', compact('contatos')); 
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            'name'=> 'required|string|max:255',
            'telefone'=> 'required|string|max:15',
            'idade'=> 'required|integer',
            'rua' => 'required|string|max:255',
            'numero' => 'required|integer',
            'cep' => 'required|string|max:10',
            'complement' => 'nullable|string|max:255',
            'estado' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);

        $contato = Contatos::findOrFail($id);
        $contato -> update($request->all());
        return redirect()->route('contatos.index')->with('success', 'Contato atualizado com sucesso');
    }

    public function destroy($id)
    {
        $contato = Contatos::findOrFail($id);
        $contato -> delete();
        return redirect()->route('contatos.index')->with('success',' Contato deletado com sucesso');
    }
}

