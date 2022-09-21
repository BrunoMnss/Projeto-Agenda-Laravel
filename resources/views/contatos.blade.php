@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <a type="button" href="{{ route('contatos.create') }}" class="btn btn-outline-secondary">Adicionar</a>
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
                            @foreach($data as $key=>$contato)
                            
                            <tr>
                                <td>{{$contato->nome}}</td>
                                <td>{{$contato->sobrenome}}</td>
                                <td>{{$contato->telefone}}</td>
                                <td>{{$contato->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection