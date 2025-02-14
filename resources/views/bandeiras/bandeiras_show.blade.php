@extends('template')

@section('content')
<h1>Detalhes da Bandeira</h1>

<div class="card max-w-sm mx-auto p-4">
    <div class="d-flex justify-content-between mb-3">
        <div>
            <div class="mb-2">
                <strong>Bandeira:</strong> {{ $bandeira->band_name }}
            </div>
            <div class="mb-2">
                <strong>CNPJ:</strong> {{ $bandeira->cnpj }}
            </div>
            <div class="mb-2">
                <strong>Grupo Econômico:</strong> {{ $bandeira->grupoEconomico->group_name }}
            </div>
        </div>

        <div class="align-self-start">
            <abbr title="Editar">
                <a href="{{ route('bandeiras.edit', $bandeira->id) }}"><i class="bi bi-pencil-square fs-5"></i></a>
            </abbr>
            <abbr title="Voltar"><a href="{{ route('bandeiras.index') }}" class="text-danger">
                    <i class="bi bi-arrow-return-left fs-5"></i>
                </a>
            </abbr>
        </div>
    </div>
</div>
@endsection