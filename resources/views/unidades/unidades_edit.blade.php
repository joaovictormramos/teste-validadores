@extends('template')

@section('content')
<h1>Editar Unidade</h1>

<form class="max-w-sm mx-auto" action="{{ route('unidades.update', $unidade) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
        <input id="nome_fantasia" type="text" name="nome_fantasia" class="form-control @error('nome_fantasia') is-invalid @enderror" value="{{ old('nome_fantasia', $unidade->nome_fantasia) }}" aria-describedby="Nome Fantasia">
        @error('nome_fantasia')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="razao_social" class="form-label">Nome Fantasia</label>
        <input id="razao_social" type="text" name="razao_social" class="form-control @error('razao_social') is-invalid @enderror" value="{{ old('razao_social', $unidade->razao_social) }}" aria-describedby="Razão Social">
        @error('razao_social')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cnpj" class="form-label">CNPJ</label>
        <input id="cnpj" type="cnpj" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror" value="{{ old('cnpj', $unidade->cnpj) }}" aria-describedby="CNPJ">
        @error('cnpj')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="bandeira_id" class="form-label">Bandeira</label>
        <select id="bandeira_id" name="bandeira_id" class="form-control">
            <option value="" disabled>Selecione</option>
            @foreach ($bandeiras as $bandeira)
            <option value="{{ $bandeira->id }}" @selected(old('bandeira_id', $unidade->bandeira_id) == $unidade->id)>
                {{ $bandeira->band_name }}
            </option>
            @endforeach
        </select>
        @error('bandeira_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('bandeiras.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection