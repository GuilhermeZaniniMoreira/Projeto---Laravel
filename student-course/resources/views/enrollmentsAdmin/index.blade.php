@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Matriculas para aprovação
                <a href="/enrollmentsAdmin/create" class="float-right btn btn-success">Novo matricula</a>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table" style="margin:auto">

                    <tr>
                        <th>Aluno</th>
                        <th>Curso</th>
                    </tr>
                    
                    @foreach($courses_users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{$courses->name}}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
