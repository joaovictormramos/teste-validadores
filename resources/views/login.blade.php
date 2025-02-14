@extends('template')
@section('content')
<div class="container">
    <div class="container text-center mt-5">
        <a href="{{ route('auth', ['provider' => 'facebook']) }}" class="btn btn-primary">
            <i class="bi bi-facebook fs-5"></i> Login com Facebook
        </a>

        <a href="{{ route('auth', ['provider' => 'google']) }}" class="btn btn-danger">
            <i class="bi bi-google fs-5"></i> Login com Google
        </a>
    </div>
</div>
@endsection