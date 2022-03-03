@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Início</a></li>
            <li class="breadcrumb-item"><a href="{{ route('discipline.index') }}">Disciplinas Eletivas</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $discipline->name }}</li>
        </ol>
    </nav>

    <ul class="list-group">
        <li class="list-group-item">Nome da Eletiva: <strong>{{ mb_strToUpper($discipline->name) }}</strong></li>
        <li class="list-group-item">Professor Responsável: <strong>{{ mb_strToUpper($discipline->teacher) }}</strong></li>
        <li class="list-group-item">Vagas disponibilizadas: <strong>{{ $discipline->numberVacancies }}</strong></li>
        <li class="list-group-item">Vagas disponíveis: <strong>{{ $discipline->availableVacancies() }}</strong></li>
    </ul>

    <h3 class="mt-3 text-center text-uppercase">Alunos Inscitos até o momento:</h3>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Turma</th>
            </tr>
        </thead>
        <tbody>
            @php $cont = 1; @endphp
            @foreach ($discipline->votes as $item)
                <tr>
                    <td>{{ $cont }}</td>
                    <td>{{ $item->student->name }}</td>
                    <td>{{ $item->student->registration }}</td>
                    <td>{{ $item->student->schoolClass->name }}</td>
                </tr>
                @php $cont ++; @endphp
            @endforeach
        </tbody>
    </table>
@endsection
