@extends('template')
@section('content')
<h1>Cadastrar Colaborador</h1>

<form class="max-w-sm mx-auto" action="{{ route('colaboradors.store') }}" method="post">

    @csrf

    <div class="mb-3">
        <label for="colab_name" class="form-label">Nome</label>
        <input id="colab_name" type="text" name="colab_name" class="form-control @error('colab_name') is-invalid @enderror" value="{{ old('colab_name') }}" aria-describedby="Nome" placeholder="Insira o nome do colaborador">
        @error('colab_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" aria-describedby="Email" placeholder="Insira o email do colaborador">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input id="cpf" type="text" name="cpf" class="@error('cpf') is-invalid @enderror form-control" value="{{ old('cpf') }}" oninput="mascaraCPF(this)" placeholder="999.999.999-99" />
        @error('cpf')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <select name="unidade_id">
            <option value="" disabled selected>Selecione</option>
            @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" @selected(old('unidade_id')==$unidade->id)>
                {{ $unidade->nome_fantasia }}
            </option>
            @endforeach
        </select>
        @error('unidade_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="{{ route('colaboradors.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection