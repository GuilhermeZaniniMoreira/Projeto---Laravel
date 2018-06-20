@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Estudantes
                    <a href="/students/create" class="float-right btn btn-success">Novo estudante</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table" style="margin:auto">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                        
                        @foreach($students as $s)
                            <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->CPF }}</td>
                                <td>{{ $s->RG }}</td>
                                <td>{{ $s->adress }}</td>
                                <td>{{ $s->phoneNumber }}</td>
                                <td class="btn">
                                    <a href="/students/{{ $s->id }}/edit" class="btn btn-warning">Editar</a>
                                    {!! Form::open(['url' => "/products/$s->id", 'method' => 'delete']) !!}
                                    {{ Form::submit('Deletar', ['class' => 'btn btn-danger']) }}
                                    {!! Form::close() !!}    
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
