@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$contato->nome}}</td>
                                <td>{{$contato->sobrenome}}</td>
                                <td>{{$contato->telefone}}</td>
                                <td>{{$contato->email}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <form method="POST" action="{{ route('contatos.sendEmail') }}">
                        @csrf
                        @dump($errors->any())
                        <input type="hidden" value="{{$contato->id}}" name="contato_id">
                        <input type="hidden" value="{{$contato->email}}" name="email">
                        <textarea class="form-control mt-3">

                    </textarea>
                        <button type="submit" href="{{ route('contatos.sendEmail') }}" class="btn btn-outline-secondary mt-3" >Enviar E-mail.</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection