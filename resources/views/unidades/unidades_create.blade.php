@extends('template')
@section('content')
<h1>Cadastrar Unidade</h1>

<form class="max-w-sm mx-auto" action="{{ route('unidades.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
        <input id="nome_fantasia" type="text" name="nome_fantasia" class="form-control @error('nome_fantasia') is-invalid @enderror" value="{{ old('nome_fantasia') }}" aria-describedby="Nome Fantasia" placeholder="Insira o nome fantasia">
        @error('nome_fantasia')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="razao_social" class="form-label">Razão Social</label>
        <input id="razao_social" type="text" name="razao_social" class="form-control @error('razao_social') is-invalid @enderror" value="{{ old('razao_social') }}" aria-describedby="Razão Social" placeholder="Insira a razão social">
        @error('razao_social')
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

    <div class="mb-3">
        <select name="bandeira_id">
            <option value="" disabled selected>Selecione</option>
            @foreach ($bandeiras as $bandeira)
            <option value="{{ $bandeira->id }}" @selected(old('bandeira_id')==$bandeira->id)>
                {{ $bandeira->band_name }}
            </option>
            @endforeach
        </select>
        @error('bandeira_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="{{ route('unidades.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection