@extends('layouts.main')

@section('title', $disciplina->nome_disciplina)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/disciplinas/{{ $disciplina->image }}" class="img-fluid" alt="{{ $disciplina->nome_disciplina }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $disciplina->nome_disciplina }}</h1>
        <p class="disciplinas-sigla"><ion-icon name="school-outline"></ion-icon> {{ $disciplina->sigla }}</p>
        <p class="disciplinas-carga_horaria"><ion-icon name="time-outline"></ion-icon> {{ $disciplina->carga_horaria }} Horas</p>
        <h3>A disciplina está nos cursos de:</h3>
        <ul id="items-list">
        @foreach($disciplina->cursos as $curso)
          <li><ion-icon name="play-outline"></ion-icon> <span>{{ $curso }}</span></li>
        @endforeach
      </div>
    </div>
  </div>

@endsection