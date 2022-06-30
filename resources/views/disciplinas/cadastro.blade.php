@extends('layouts.main')

@section('title', 'Cadastrar Disciplina')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastre a Disciplina</h1>
  <form action="/disciplinas" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Imagem da Disciplina:</label>
      <input type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Disciplina">
    </div>
    <div class="form-group">
      <label for="sigla">Sigla da Disciplina:</label>
      <input type="text" class="form-control" id="sigla" name="sigla" placeholder="Sigla">
    </div>
    <div class="form-group">
      <label for="title">Selecione os Cursos o qual a disciplina faz Parte:</label>
      <div class="form-group">	
        <input type="checkbox" name="cursos[]" value="Análise e Desenvolvimento de Sistemas"> Análise e Desenvolvimento de Sistemas
      </div>
      <div class="form-group">	
        <input type="checkbox" name="cursos[]" value="Engenharia Civil"> Engenharia Civil
      </div>
      <div class="form-group">	
        <input type="checkbox" name="cursos[]" value="Fisíca"> Fisíca
      </div>
      <div class="form-group">	
        <input type="checkbox" name="cursos[]" value="Engenharia Elétrica"> Engenharia Elétrica
      </div>
      <div class="form-group">	
        <input type="checkbox" name="cursos[]" value="Medicina"> Medicina
      </div>
    </div>
    <div class="form-group">
      <label for="cargahoraria">Carga Horária:</label>
      <input type="number" class="form-control" id="cargahoraria" name="cargahoraria" placeholder="Carga Horária">
    </div>
    <input type="submit" class="btn btn-primary" value="Cadastrar Disciplina">
  </form>
</div>

@endsection