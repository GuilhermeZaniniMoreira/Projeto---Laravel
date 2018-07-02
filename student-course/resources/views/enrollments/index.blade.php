@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Matriculas
                <a href="/enrollments/create" class="float-right btn btn-success">Novo matricula</a>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
                <p>Matriculas aprovadas</p>

                <table class="table" style="margin:auto">

                    <tr>
                        <th>Curso</th>
                        <th>Ementa</th>
                    </tr>
                    
                    @foreach($user->courses->where('authorized', 1) as $eC)
                        <tr>
                            <td>{{ $eC->name }}</td>
                            <td>{{ $eC->ementa  }}</td>
                        </tr>
                    @endforeach
                </table>

                <br>
                    <p>Matriculas aguardando revisão do administrador</p>
                <br>

                <table class="table" style="margin:auto">

                    <tr>
                        <th>Curso</th>
                        <th>Ementa</th>
                    </tr>
                    
                    @foreach($user->courses->where('authorized', 0) as $eC)
                        <tr>
                            <td>{{ $eC->name }}</td>
                            <td>{{ $eC->ementa  }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
