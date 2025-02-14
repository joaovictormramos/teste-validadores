@extends('template')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestão de Sistema</h2>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        <div class="col">
            <a href="{{ route('grupos.index') }}" class="btn btn-primary w-100">Grupos Econômicos</a>
        </div>
        <div class="col">
            <a href="{{ route('bandeiras.index') }}" class="btn btn-primary w-100">Bandeiras</a>
        </div>
        <div class="col">
            <a href="{{ route('unidades.index') }}" class="btn btn-primary w-100">Unidades</a>
        </div>
        <div class="col">
            <a href="{{ route('colaboradors.index') }}" class="btn btn-primary w-100">Colaboradores</a>
        </div>
        <div class="col">
            <a href="{{ route('audits.index') }}" class="btn btn-primary w-100">Auditoria</a>
        </div>
    </div>
</div>
@endsection