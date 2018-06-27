@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Novo Estudante
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => '/students', 'method' => 'post']) !!}
                        
                        {{ Form::label('nome', 'Nome') }}
                        {{ Form::text('name') }}

                        <br /><br />

                        {{ Form::label('cpf', 'CPF') }}
                        {{ Form::text('cpf') }}
                        
                        <br /><br />

                        {{ Form::label('rg', 'RG') }}
                        {{ Form::text('rg') }}

                        <br /><br />

                        {{ Form::label('adress', 'Endereço') }}
                        {{ Form::text('adress') }}

                        <br /><br />

                        {{ Form::label('phoneNumber', 'Telefone') }}
                        {{ Form::text('phoneNumber') }}

                        <br /><br />

                        {{ Form::submit('Salvar') }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
