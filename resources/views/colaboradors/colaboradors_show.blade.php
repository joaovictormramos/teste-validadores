@extends('template')

@section('content')
<h1>Detalhes do Colaborador</h1>

<div class="card max-w-sm mx-auto p-4">
    <div class="d-flex justify-content-between mb-3">
        <div>
            <div class="mb-2">
                <strong>Nome:</strong> {{ $colaborador->colab_name }}
            </div>
            <div class="mb-2">
                <strong>Email:</strong> {{ $colaborador->email }}
            </div>
            <div class="mb-2">
                <strong>CPF:</strong> {{ $colaborador->cpf }}
            </div>
            <div class="mb-2">
                <strong>Unidade:</strong> {{ $colaborador->unidade->nome_fantasia ?? 'Não informado' }}
            </div>
        </div>

        <div class="align-self-start">
            <abbr title="Editar">
                <a href="{{ route('colaboradors.edit', $colaborador->id) }}"><i class="bi bi-pencil-square fs-5"></i></a></abbr>
            <abbr title="Voltar"><a href="{{ route('colaboradors.index') }}" class="text-danger"><i class="bi bi-arrow-return-left fs-5"></i></a></abbr>
        </div>
    </div>
</div>
@endsection