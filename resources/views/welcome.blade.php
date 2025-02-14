@extends('template')
@section('content')
<div class="container text-center">
    <h1><strong>BEM-VINDO</strong></h1>
    @guest
    <a href="{{ route('login') }}">Iniciar sessão</a>
    @endguest
</div>
@endsection