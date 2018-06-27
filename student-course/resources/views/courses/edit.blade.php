@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar curso
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/courses/$course->id", 'method' => 'put']) !!}
                        
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('name', $course->name) }}

                        <br /><br />

                        {{ Form::label('ementa', 'Ementa') }}
                        {{ Form::text('ementa', $course->ementa) }}

                        <br /><br />

                        {{ Form::label('qtdStudents', 'Quantida máxima de alunos') }}
                        {{ Form::text('qtdStudents', $course->qtdStudents) }}

                         <br /><br />

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
