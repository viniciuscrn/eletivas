@extends('layouts.public')

@section('content')
    <h3 class="alert alert-info text-center">Confira os dados da sua escolha e confirme:</h3>
    <ul class="list-group">
        <li class="list-group-item">Nome do Aluno: <strong>{{ mb_strToUpper($student->name) }}</strong></li>
        <li class="list-group-item">Contato do Aluno: <strong>{{ mb_strToUpper($student->tel) }}</strong></li>
        <li class="list-group-item">Turma do Aluno: <strong>{{ mb_strToUpper($student->schoolClass->name) }}</strong></li>
        <li class="list-group-item">Eletiva escolhida: <strong>{{ mb_strToUpper($discipline->name) }}</strong></li>
        <li class="list-group-item">Professor responsável: <strong>{{ mb_strToUpper($discipline->teacher) }}</strong></li>
    </ul>
    <form action="{{ route('vote.storeVote') }}" method="POST">
        @csrf
        <input type="hidden" name="discipline" value="{{ $discipline->id }}">
        <input type="hidden" name="student" value="{{ $student->id }}">
        <input type="hidden" name="tel" value="{{ $student->tel }}">
        <button class="btn btn-primary btn-lg mt-3" type="submit">CONFIRMAR ESCOLHA</button>
        <a class="btn btn-secondary btn-lg mt-3" onclick="voltar()">Voltar</a>
    </form>
    <script>
        function voltar() {
        window.history.back();
        }
        </script>
@endsection
