@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Cursos
                <a href="/courses/create" class="float-right btn btn-success">Novo curso</a>
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
                        <th>Ementa</th>
                        <th>Quantidade Máxima de Alunos</th>
                        <th>Ações</th>
                    </tr>
                    
                    @foreach($courses as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->ementa  }}</td>
                            <td>{{ $c->qtdStudents }}</td>
                            <td class="btn">    
                                <a href="/courses/{{ $c->id }}/edit" class="btn btn-warning">Editar</a>
                                                        
                                {!! Form::open(['url' => "/courses/$c->id", 'method' => 'delete']) !!}
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
