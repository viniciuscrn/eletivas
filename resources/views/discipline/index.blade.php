@extends('layouts.app')

@section('content')
    <!-- MENSAGEM  -->
    @if (session('mensagem'))
        <div class="alert alert-{{ session('mensagem.alert') }} border-left-{{ session('mensagem.alert') }} alert-dismissible fade show"
            role="alert">
            {{ session('mensagem.texto') }}
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    @endif
    <h2>Disciplinas Eletivas</h2>
    <hr>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        + Adicionar Disciplina Eletiva
    </button>
    @if ($disciplines->count())
        @foreach ($disciplines as $item)
        <div class="card mb-3" style="max-heigth: 400px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/storage/disciplines/images/{{ $item->image }}" class="img-fluid rounded-start" alt="...">
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
                  <p class="card-text">Professor Responsável: <strong>{{ $item->teacher }}</strong></p>
                  <p>
                    <a href="{{ route('discipline.show', ['id' => $item->id]) }}">Detalhar</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
    @else
        <p class="alert alert-warning">Nenhuma disciplina eletiva adicionada até o momento.</p>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="row g-3" action="{{ route('discipline.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">+ Adicionar Disciplina Eletiva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição da Eletiva</label>
                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="teacher" class="form-label">Professor Responsável</label>
                            <input type="text" class="form-control" name="teacher" id="teacher" required>
                        </div>
                        <div class="mb-3">
                            <label for="numberVacancies" class="form-label">Número de vagas disponíveis</label>
                            <input type="number" min="0" max="50" class="form-control" name="numberVacancies"
                                id="numberVacancies" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagem da Eletiva</label>
                            <input class="form-control" name="image" type="file" id="image" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
