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
                    
                    @foreach($enrollmentsAproved as $e)
                        <tr>
                            <td>{{ $e->name }}</td>
                            <td>{{ $e->ementa  }}</td>
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
                    
                    @foreach($enrollmentsWaiting as $eW)
                        <tr>
                            <td>{{ $eW->name }}</td>
                            <td>{{ $eW->ementa  }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
