@extends('template')

@section('content')
<h1>Detalhes da Unidade</h1>

<div class="card max-w-sm mx-auto p-4">
    <div class="d-flex justify-content-between mb-3">
        <div>
            <div class="mb-2">
                <strong>Nome Fantasia:</strong> {{ $unidade->nome_fantasia }}
            </div>
            <div class="mb-2">
                <strong>Razão Social:</strong> {{ $unidade->razao_social }}
            </div>
            <div class="mb-2">
                <strong>CNPJ:</strong> {{ $unidade->cnpj }}
            </div>
            <div class="mb-2">
                <strong>Bandeira:</strong> {{ $unidade->bandeira->band_name }}
            </div>
        </div>

        <div class="align-self-start">
            <abbr title="Editar">
                <a href="{{ route('unidades.edit', $unidade->id) }}"><i class="bi bi-pencil-square fs-5"></i></a></abbr>
            <abbr title="Voltar"><a href="{{ route('unidades.index') }}" class="text-danger"><i class="bi bi-arrow-return-left fs-5"></i></a></abbr>
        </div>
    </div>
</div>
@endsection