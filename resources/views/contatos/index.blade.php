@extends('layouts.app')

@section('title', 'Lista de Contatos')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Lista de Contatos</h2>

    <div class="d-flex justify-content-between mb-3">
        <form action="{{ route('contatos.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" name="search" value="{{ $search ?? '' }}" placeholder="Pesquisar contatos...">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                <a href="{{ route('contatos.create') }}" class="btn btn-info btn-sm acustom">Cadastrar Novo Contato</a>
            </div>
        </form>
    </div>

    <!-- Tabela de contatos 1-->
    <div class="table-responsive"> 
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Idade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @php
                $contatos = $contatos ?? collect();
            @endphp
                
            @foreach ($contatos as $contato)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contato->name }}</td>
                        <td>{{ $contato->telefone }}</td>
                        <td>{{ $contato->idade }}</td>
                        <td>
                            <!-- Botão para editar -->
                            <a href="{{ route('contatos.edit', $contato->id) }}" class="btn btn-info btn-sm acustom">Editar</a>

                            <!-- Botão para deletar -->
                            <form action="{{ route('contatos.destroy', $contato->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Deletar</button>
                            </form>

                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#addressModal{{ $contato->id }}">Ver Endereço</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="addressModal{{ $contato->id }}" tabindex="-1" aria-labelledby="addressModalLabel{{ $contato->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content modalcustom">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addressModalLabel{{ $contato->id }}">Endereço de {{ $contato->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>CEP:</strong> {{ $contato->cep }}</p>
                                    <p><strong>Rua:</strong> {{ $contato->rua }}, {{ $contato->numero }} {{ $contato->complement }}</p>
                                    <p><strong>Cidade:</strong> {{ $contato->cidade }} - {{ $contato->estado }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>  
    @if ($contatos->isEmpty())
        <p class="text-center mt-4">Nenhum contato encontrado.</p>
    @endif
</div>
@endsection