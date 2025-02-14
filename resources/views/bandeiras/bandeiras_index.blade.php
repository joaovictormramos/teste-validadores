@extends('template')
@section('content')
<h1>Bandeiras</h1>

<div class="d-flex justify-content-between mb-3">

    <div>
        <abbr title="Novo">
            <a href="{{ route('bandeiras.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle fs-6"></i>
            </a>
        </abbr>
        <abbr title="Exportar Relatório">
            <a href="{{ route('bandeiras.export') }}" class="btn btn-primary">
                <i class=" bi bi-file-earmark-arrow-down fs-6"></i>
            </a>
        </abbr>
    </div>

    <form action="{{ route('bandeiras.index') }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control" placeholder="Buscar Bandeira" value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-secondary ms-2"><i class="bi bi-search fs-6"></i></button>
    </form>
</div>

<table class="table border">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CNPJ</th>
            <th>Grupo Econômico</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bandeiras as $bandeira)
        <tr>
            <td>{{$bandeira->band_name}}</td>
            <td>{{$bandeira->cnpj}}</td>
            <td>{{$bandeira->grupoEconomico->group_name}}</td>
            <td>
                <abbr title="Detalhes">
                    <a href="{{ route('bandeiras.show', $bandeira) }}">
                        <i class="bi bi-info-circle fs-5"></i>
                    </a>
                </abbr>

                <abbr title="Editar">
                    <a href="{{ route('bandeiras.edit', $bandeira) }}">
                        <i class="bi bi-pencil-square fs-5"></i>
                    </a>
                </abbr>

                <abbr title="Excluir">
                    <a href="#" onclick="event.preventDefault(); if (confirm('Tem certeza que deseja excluir?')) { document.getElementById('delete-form-{{ $bandeira->id }}').submit(); }" class="text-danger">
                        <i class="bi bi-trash3 fs-5"></i>
                    </a>
                    <form id="delete-form-{{ $bandeira->id }}" action="{{ route('bandeiras.destroy', $bandeira) }}" method="POST" style="display: none;">
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