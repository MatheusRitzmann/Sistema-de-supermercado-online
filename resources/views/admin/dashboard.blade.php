@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Bem-vindo ao Painel Administrativo</h2>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Gerenciar Endereços
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.enderecos.index') }}" class="btn btn-primary btn-block">Ver Endereços</a>
                        <a href="{{ route('admin.enderecos.create') }}" class="btn btn-success btn-block">Cadastrar Novo Endereço</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Gerenciar Cidades
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.cidades.index') }}" class="btn btn-primary btn-block">Ver Cidades</a>
                        <a href="{{ route('admin.cidades.create') }}" class="btn btn-success btn-block">Cadastrar Nova Cidade</a>
                    </div>
                </div>
            </div>

            <!-- Adicione mais seções conforme necessário -->
        </div>
    </div>
@endsection