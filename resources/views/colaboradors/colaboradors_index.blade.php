@extends('template')
@section('content')
<h1>Colaboradores</h1>

<div class="d-flex justify-content-between mb-3">

    <div>
        <abbr title="Novo">
            <a href="{{ route('colaboradors.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus fs-6"></i>
            </a>
        </abbr>
        <abbr title="Exportar Relatório">
            <a href="{{ route('colaboradors.export') }}" class="btn btn-primary">
                <i class=" bi bi-file-earmark-arrow-down fs-6"></i>
            </a>
        </abbr>
    </div>

    <form action="{{ route('colaboradors.index') }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control" placeholder="Buscar Colaborador" value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-secondary ms-2"><i class="bi bi-search fs-6"></i></button>
    </form>
</div>

<table class="table border">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Unidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($colaboradors as $colaborador)
        <tr>
            <td>{{$colaborador->colab_name}}</td>
            <td>{{$colaborador->email}}</td>
            <td>{{$colaborador->cpf}}</td>
            <td>{{$colaborador->unidade->nome_fantasia}}</td>
            <td>
                <abbr title="Detalhes">
                    <a href="{{ route('colaboradors.show', $colaborador) }}">
                        <i class="bi bi-info-circle fs-5"></i>
                    </a>
                </abbr>

                <abbr title="Editar">
                    <a href="{{ route('colaboradors.edit', $colaborador) }}">
                        <i class="bi bi-pencil-square fs-5"></i>
                    </a>
                </abbr>

                <abbr title="Excluir">
                    <a href="#" onclick="event.preventDefault(); if (confirm('Tem certeza que deseja excluir?')) { document.getElementById('delete-form-{{ $colaborador->id }}').submit(); }" class="text-danger">
                        <i class="bi bi-trash3 fs-5"></i>
                    </a>
                    <form id="delete-form-{{ $colaborador->id }}" action="{{ route('colaboradors.destroy', $colaborador) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </abbr>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="align-self-start">
    <abbr title="Painel">
        <a href="{{ route('painel') }}" class="text-danger">
            <i class="bi bi-arrow-left fs-2"></i>
        </a>
    </abbr>
</div>
@endsection