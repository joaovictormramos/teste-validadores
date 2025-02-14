@extends('template')
@section('content')
<h1>Cadastrar Grupo Econômico</h1>

<form class="max-w-sm mx-auto" action="{{ route('grupos.store') }}" method="post">

    @csrf

    <div class="mb-3">
        <label for="group_name" class="form-label">Grupo Econômico</label>
        <input id="group_name" type="text" name="group_name" class="form-control @error('group_name') is-invalid @enderror" value="{{ old('group_name') }}" aria-describedby="Grupo Econômico" placeholder="Insira o nome do grupo econômico">
        @error('group_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cnpj" class="form-label">CNPJ</label>
        <input id="cnpj" type="text" name="cnpj" class="@error('cnpj') is-invalid @enderror form-control" value="{{ old('cnpj') }}" oninput="mascaraCNPJ(this)" placeholder="99.999.999/9999-99" />
        @error('cnpj')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection