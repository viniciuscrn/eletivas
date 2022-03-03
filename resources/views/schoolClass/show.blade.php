@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Início</a></li>
            <li class="breadcrumb-item"><a href="{{ route('schoolClass.index') }}">Turmas</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $schoolClass->name }}</li>
        </ol>
    </nav>
    <!-- MENSAGEM  -->
    @if (session('mensagem'))
        <div class="alert alert-{{ session('mensagem.alert') }} border-left-{{ session('mensagem.alert') }} alert-dismissible fade show"
            role="alert">
            {{ session('mensagem.texto') }}
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    @endif
    <h2>{{ mb_strToUpper($schoolClass->name) }}</h2>
    <hr>
    <form class="row g-3" action="{{ route('student.store') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $schoolClass->id }}">
        <div class="col-md-5">
            <label for="name" class="visually-hidden">+ Novo Aluno</label>
            <input type="text" class="form-control md-4" name="name" required id="name"
                placeholder="Informe o nome do Aluno">
        </div>
        <div class="col-auto">
            <label for="registration" class="visually-hidden">Matrícula</label>
            <input type="text" class="form-control" name="registration" required id="registration"
                placeholder="Informe a matrícula">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">+ Adicionar novo Aluno</button>
        </div>
    </form>
    @if ($schoolClass->students->count())
        <h3 class="mt-3 text-center text-uppercase">Alunos da Turma:</h3>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome do aluno</th>
                    <th>Matrícula</th>
                    <th class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @php $cont = 1; @endphp
                @foreach ($schoolClass->students as $item)
                    <tr>
                        <th>{{ $cont }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->registration }}</td>
                        <td class="text-center"><a href="#">Editar</a>
                            {{-- {{ route('student.edit', ['id' => $item->id]) }} --}}
                        </td>
                    </tr>
                    @php $cont ++; @endphp
                @endforeach
            </tbody>
        </table>
    @else
        <p class="alert alert-warning">Nenhum aluno adicionado até o momento.</p>
    @endif
@endsection
