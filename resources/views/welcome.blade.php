@extends('layouts.main')

@section('title', 'IFSP')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque por uma Disciplina</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Disciplinas Cadastradas</h2>
    <p class="subtitle">Veja as disciplinas cadastradas</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($disciplinas as $disciplina)
        <div class="card col-md-3">
            <img src="/img/disciplinas/{{ $disciplina->image }}" alt="{{ $disciplina->nome_disciplina }}">
            <div class="card-body">
                <h5 class="card-title">{{ $disciplina->nome_disciplina }}</h5>
                <p class="card-participants"> {{ $disciplina->sigla }} </p>
                <a href="/disciplinas/{{ $disciplina->id }}" class="btn btn-primary">Saber Mais</a>
            </div>
        </div>
        @endforeach
        @if(count($disciplinas) == 0 && $search)
            <p>Não foi possível encontrar nenhuma disciplina com {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($disciplinas) == 0)
            <p>Não há discplinas cadastradas</p>
        @endif
    </div>
</div>

@endsection