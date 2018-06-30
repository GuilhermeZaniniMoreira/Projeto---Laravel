@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Nova Matricula
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/enrollmentsAdmin', 'method' => 'post']) !!}
                            
                        {{ Form::label('users', 'Estudantes') }}
                        {{ Form::select('user', $users ) }}

                        <br /><br />

                        {{ Form::label('courses', 'Cursos') }}
                        {{ Form::select('course', $courses ) }}
                        
                        <br /><br />

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
