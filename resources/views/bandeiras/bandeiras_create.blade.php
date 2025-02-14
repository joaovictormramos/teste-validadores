@extends('template')
@section('content')
<h1>Cadastrar Bandeira</h1>

<form class="max-w-sm mx-auto" action="{{ route('bandeiras.store') }}" method="post">

    @csrf

    <div class="mb-3">
        <label for="band_name" class="form-label">Bandeira</label>
        <input id="band_name" type="text" name="band_name" class="form-control @error('band_name') is-invalid @enderror" value="{{ old('band_name') }}" aria-describedby="Bandeira" placeholder="Insira o nome da bandeira">
        @error('band_name')
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
        <label for="grupo_economico_id" class="form-label">Grupo Econômico</label>
        <select name="grupo_economico_id" class="@error('grupo_economico_id') is-invalid @enderror">
            <option value="" disabled selected>Selecione</option>
            @foreach ($grupos as $grupo)
            <option value="{{ $grupo->id }}" @selected(old('grupo_economico_id')==$grupo->id)>
                {{ $grupo->group_name }}
            </option>
            @endforeach
        </select>
        @error('grupo_economico_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="{{ route('bandeiras.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection