@extends('layouts.app')
@section('content')
@guest
<x-login />
@endguest
@auth
<a type="button" class="btn btn-primary" href="{{ route('contatos.index')}}">
    Ver Contatos
</a>
@endauth
@endsection
@section('scripts')


@endsection