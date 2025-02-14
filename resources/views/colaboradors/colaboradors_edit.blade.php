@extends('template')

@section('content')
<h1>Editar Colaborador</h1>

<form class="max-w-sm mx-auto" action="{{ route('colaboradors.update', $colaborador) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="colab_name" class="form-label">Nome</label>
        <input id="colab_name" type="text" name="colab_name" class="form-control @error('colab_name') is-invalid @enderror" value="{{ old('colab_name', $colaborador->colab_name) }}" aria-describedby="Nome">
        @error('colab_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $colaborador->email) }}" aria-describedby="Email">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input id="cpf" type="text" name="cpf" class="@error('cpf') is-invalid @enderror form-control" value="{{ old('cpf', $colaborador->cpf) }}" oninput="mascaraCPF(this)" />
        @error('cpf')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="unidade_id" class="form-label">Unidade</label>
        <select id="unidade_id" name="unidade_id" class="form-control">
            <option value="" disabled>Selecione</option>
            @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" @selected(old('unidade_id', $colaborador->unidade_id) == $unidade->id)>
                {{ $unidade->nome_fantasia }}
            </option>
            @endforeach
        </select>
        @error('unidade_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('colaboradors.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection