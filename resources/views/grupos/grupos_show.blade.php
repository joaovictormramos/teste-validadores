@extends('template')

@section('content')
<h1>Detalhes do Grupo Econômico</h1>

<div class="card max-w-sm mx-auto p-4">
    <div class="d-flex justify-content-between mb-3">
        <div>
            <div class="mb-2">
                <strong>Nome:</strong> {{ $grupo->group_name }}
            </div>
            <div class="mb-2">
                <strong>CNPJ:</strong> {{ $grupo->cnpj }}
            </div>
        </div>

        <div class="align-self-start">
            <abbr title="Editar">
                <a href="{{ route('grupos.edit', $grupo->id) }}">
                    <i class="bi bi-pencil-square fs-5"></i>
                </a>
            </abbr>
            <abbr title="Voltar">
                <a href="{{ route('grupos.index') }}" class="text-danger">
                    <i class="bi bi-arrow-return-left fs-5"></i></a>
            </abbr>
        </div>
    </div>
</div>
@endsection