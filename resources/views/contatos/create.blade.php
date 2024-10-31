@extends('layouts.app')

@section('title', 'Criar Contato')

@section('content')
<div class="container">
    <div>
        <h2 class="text-center mb-4">Criar Contato</h2>

        <!-- Formulário de criação de contato -->
        <form action="{{ route('contatos.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group mb-3">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone" required>
            </div>
            <div class="form-group mb-3">
                <label for="idade">Idade</label>
                <input type="number" class="form-control" name="idade" id="idade" required>
            </div>
            <div class="form-group mb-3">
                <label for="rua">Rua</label>
                <input type="text" class="form-control" name="rua" id="rua" required>
            </div>
            <div class="form-group mb-3">
                <label for="numero">Número</label>
                <input type="number" class="form-control" name="numero" id="numero" required>
            </div>
            <div class="form-group mb-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" name="cep" id="cep" required>
            </div>
            <div class="form-group mb-3">
                <label for="complement">Complemento</label>
                <input type="text" class="form-control" name="complement" id="complement">
            </div>
            <div class="form-group mb-3">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" name="estado" id="estado" required>
            </div>
            <div class="form-group mb-3">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="cidade" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Criar Contato</button>
        </form>
    </div>
</div>
@endsection
