@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- MENSAGEM  -->
        @if (session('mensagem'))
            <div class="alert alert-{{ session('mensagem.alert') }} border-left-{{ session('mensagem.alert') }} alert-dismissible fade show"
                role="alert">
                {{ session('mensagem.texto') }}
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div>
        @endif
        <form class="row g-2" action="{{ route('vote.student') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="registration" class="form-control form-control-lg"
                    placeholder="Informe sua Matrícula" aria-label="Informe sua Matrícula" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
            </div>
        </form>

        @if (isset($student))
            <div class="alert alert-info">
                <p>Nome do Aluno: {{ mb_strToUpper($student->name) }}</p>
                <p>Matrícula: {{ $student->registration }}</p>
                <p>Turma: {{ mb_strToUpper($student->schoolClass->name) }}</p>
            </div>
            <h2 class="text-center mt-3">ESCOLHA A DISCIPLINA ELETIVA</h2>    
            <hr>
            @if(isset($disciplines))
                @foreach ($disciplines as $item)
                    <div class="card mb-3" style="max-heigth: 400px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/storage/disciplines/images/{{ $item->image }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }} <small class="text-muted">(
                                            {{ $item->numberVacancies }} vagas disponibilizadas.)</small></h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <p class="card-text">Professor Responsável:
                                        <strong>{{ $item->teacher }}</strong>
                                    </p>
                                    <p>
                                        <a href="{{ route('discipline.show', ['id' => $item->id]) }}">Detalhar</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>
@endsection
