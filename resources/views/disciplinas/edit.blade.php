@extends('layouts.main')

@section('title', 'Editando: '. $disciplina->nome_disciplina)

@section('content')

<div id="disciplina-create-container" class="col-md-6 offset-md-3">
  <h1>Editando {{$disciplina->nome_disciplina}}</h1>
  <form action="/disciplinas/update/{{ $disciplina->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="image">Imagem da Disciplina:</label>
      <input type="file" id="image" name="image" class="from-control-file">
      <img src="/img/disciplinas/{{ $disciplina->image }}" alt="{{ $disciplina->nome_disciplina }}" class="img-preview">
    </div>
    <div class="form-group">
      <label for="nome_disciplina">Nome:</label>
      <input type="text" class="form-control" id="nome_disciplina" name="nome_disciplina" placeholder="Nome da Disciplina" value="{{ $disciplina->nome_disciplina }}">
    </div>
    <div class="form-group">
      <label for="sigla">Sigla da Disciplina:</label>
      <input type="text" class="form-control" id="sigla" name="sigla" placeholder="Sigla" value="{{ $disciplina->sigla }}">
    </div>
    <div class="form-group">
      <label for="carga_horaria">Carga Horária:</label>
      <input type="number" class="form-control" id="carga_horaria" name="carga_horaria" placeholder="Carga Horária" value="{{ $disciplina->carga_horaria }}">
    </div>
    <input type="submit" class="btn btn-primary" value="Editar Disciplina">
  </form>
</div>

@endsection