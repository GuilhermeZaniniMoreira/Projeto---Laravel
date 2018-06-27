@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Matricula: Estudante em curso
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "/students/$student->id", 'method' => 'put']) !!}
                        
                    {{ Form::label('nome', 'Nome') }}
                    {{ Form::text('name', $student->name) }}

                    <br /><br />

                    {{ Form::label('cpf', 'CPF') }}
                    {{ Form::text('cpf', $student->CPF) }}
                    
                    <br /><br />

                    {{ Form::label('rg', 'RG') }}
                    {{ Form::text('rg', $student->RG) }}

                    <br /><br />

                    {{ Form::label('adress', 'Endereço') }}
                    {{ Form::text('adress', $student->adress) }}

                    <br /><br />

                    {{ Form::label('phoneNumber', 'Telefone') }}
                    {{ Form::text('phoneNumber',  $student->phoneNumber) }}

                    <br /><br />

                    {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
