@extends('template')

@section('content')
<h1 class="my-4">Auditoria</h1>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Data</th>
                <th>Usuário</th>
                <th>Ação</th>
                <th>Tabela</th>
                <th colspan="2">Alterações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $log->user->name }}</td>
                <td>{{ $log->acao }}</td>
                <td>{{ $log->tabela }}</td>
                <td>
                    <button class="btn btn-sm btn-info" data-bs-toggle="collapse" data-bs-target="#oldData{{ $log->id }}">
                        <i class="bi bi-eye-fill"></i> Dados antigos
                    </button>
                    <div id="oldData{{ $log->id }}" class="collapse mt-2">
                        @if($log->valor_antigo)
                        <p title="{{ $log->valor_antigo }}" style="display: block; max-width: none; white-space: normal; overflow: visible; text-overflow: unset;">
                            {{ urldecode($log->valor_antigo) }}
                        </p>
                        @else
                        <p class="text-muted">Nenhum valor antigo</p>
                        @endif
                    </div>
                </td>
                <td>
                    <button class="btn btn-sm btn-success" data-bs-toggle="collapse" data-bs-target="#newData{{ $log->id }}">
                        <i class="bi bi-eye-fill"></i> Dados novos
                    </button>
                    <div id="newData{{ $log->id }}" class="collapse mt-2">
                        @if($log->novo_valor)
                        <p title="{{ $log->novo_valor }}" style="display: block; max-width: none; white-space: normal; overflow: visible; text-overflow: unset;">
                            {{ urldecode($log->novo_valor) }}
                        </p>
                        @else
                        <p class="text-muted">Nenhum valor novo</p>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
