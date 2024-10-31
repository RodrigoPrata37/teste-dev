@extends('layouts.app')

@section('title', 'Editar Contato')

@section('content')
<div class="container mt-5">
    <h2>Editar Contato</h2>


    <form action="{{ route('contatos.update', $contatos->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" required>
        </div>
        <div class="form-group">
            <label for="idade">Idade</label>
            <input type="number" class="form-control" name="idade" id="idade" required>
        </div>
        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" name="rua" id="rua" required>
        </div>
        <div class="form-group">
            <label for="numero">Número</label>
            <input type="number" class="form-control" name="numero" id="numero" required>
        </div>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" id="cep" required>
        </div>
        <div class="form-group">
            <label for="complement">Complemento</label>
            <input type="text" class="form-control" name="complement" id="complement">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" name="estado" id="estado" required>
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" name="cidade" id="cidade" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Contato</button>
    </form>
</div>
@endsection