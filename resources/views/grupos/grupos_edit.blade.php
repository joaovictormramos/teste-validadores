@extends('template')

@section('content')
<h1>Editar Grupo Econômico</h1>

<form class="max-w-sm mx-auto" action="{{ route('grupos.update', $grupo) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="group_name" class="form-label">Nome</label>
        <input id="group_name" type="text" name="group_name" class="form-control @error('group_name') is-invalid @enderror" value="{{ old('group_name', $grupo->group_name) }}" aria-describedby="Nome">
        @error('group_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cnpj" class="form-label">CNPJ</label>
        <input id="cnpj" type="cnpj" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror" value="{{ old('cnpj', $grupo->cnpj) }}" aria-describedby="CNPJ">
        @error('cnpj')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection