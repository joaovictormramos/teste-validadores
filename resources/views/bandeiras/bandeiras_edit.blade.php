@extends('template')

@section('content')
<h1>Editar Bandeira</h1>

<form class="max-w-sm mx-auto" action="{{ route('bandeiras.update', $bandeira) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="band_name" class="form-label">Bandeira</label>
        <input id="band_name" type="text" name="band_name" class="form-control @error('band_name') is-invalid @enderror" value="{{ old('band_name', $bandeira->band_name) }}" aria-describedby="Bandeira">
        @error('band_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cnpj" class="form-label">CNPJ</label>
        <input id="cnpj" type="cnpj" name="cnpj" class="form-control @error('cnpj') is-invalid @enderror" value="{{ old('cnpj', $bandeira->cnpj) }}" aria-describedby="CNPJ">
        @error('cnpj')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="grupo_economico_id" class="form-label">Unidade</label>
        <select id="grupo_economico_id" name="grupo_economico_id" class="form-control">
            <option value="" disabled>Selecione</option>
            @foreach ($grupos as $grupo)
            <option value="{{ $grupo->id }}" @selected(old('grupo_economico_id', $bandeira->grupoEconomico->id) == $grupo->id)>
                {{ $grupo->group_name }}
            </option>
            @endforeach
        </select>
        @error('grupo_economico_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('bandeiras.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection