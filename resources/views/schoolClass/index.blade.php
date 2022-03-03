@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">Turmas</li>
    </ol>
    <!-- MENSAGEM  -->
    @if (session('mensagem'))
        <div class="alert alert-{{ session('mensagem.alert') }} border-left-{{ session('mensagem.alert') }} alert-dismissible fade show"
            role="alert">
            {{ session('mensagem.texto') }}
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    @endif
    <form class="row g-3" action="{{ route('schoolClass.store') }}" method="post">
        @csrf
        <div class="col-auto">
            <label for="name" class="visually-hidden">+ Nova Turma</label>
            <input type="text" class="form-control" name="name" required id="name" placeholder="Informe o nome da Turma">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">+ Adicionar nova turma</button>
        </div>
    </form>
    @if ($schoolClasses->count())
        <h3>Turmas Informadas:</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome da turma</th>
                    <th class="text-center">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schoolClasses as $item)
                    <tr>
                        <td>{{ $item->name }} <small class="alert-info">({{ $item->students->count() }}
                                alunos)</small></td>
                        <td class="text-center"><a
                                href="{{ route('schoolClass.show', ['id' => $item->id]) }}">Detalhar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="alert alert-warning">Nenhuma turma adicionada até o momento.</p>
    @endif
@endsection
