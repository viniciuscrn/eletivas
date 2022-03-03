@extends('layouts.public')

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
            @if ($student->vote)
                <div class="alert alert-info">
                    <p class="text-uppercase">Este aluno já efetuou sua escolha!</p>
                    <hr>
                    <p>Disciplina Eletiva: {{ $student->vote->discipline->name }}</p>
                    <p>Professor responsável: {{ $student->vote->discipline->teacher }}</p>
                </div>
            @else
                <h2 class="text-center mt-3">ESCOLHA A DISCIPLINA ELETIVA</h2>
                <hr>
                @if (isset($disciplines))
                    <form action="{{ route('vote.confirm') }}" method="post">
                        @csrf
                        <input type="hidden" name="student" value="{{ $student->id }}">
                        @php $cont = 1; @endphp
                        @foreach ($disciplines as $item)
                            <div class="card mb-3" style="max-heigth: 400px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/storage/disciplines/images/{{ $item->image }}"
                                            class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ mb_strToUpper($item->name) }}</h5> 
                                                <p class="text-muted">
                                                    ({{ $item->numberVacancies }} vagas disponibilizadas
                                                    -
                                                    {{ $item->availableVacancies() }} disponíveis)
                                                </p>
                                            
                                            <p class="card-text">{{ $item->description }}</p>
                                            <p class="card-text">Professor Responsável:
                                                <strong>{{ $item->teacher }}</strong>
                                            </p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="discipline"
                                                    id="discipline{{ $cont }}" value="{{ $item->id }}">
                                                <label class="form-check-label alert-info"
                                                    for="discipline{{ $cont }}">
                                                    ESCOLHER {{ mb_strToUpper($item->name) }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $cont ++; @endphp
                        @endforeach
                        <button class="btn btn-primary btn-lg" type="submit" id="button">ENVIAR MINHA ESCOLHA</button>
                    </form>
                @endif
            @endif
        @endif
    </div>
@endsection
