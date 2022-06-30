@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($disciplinas) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome Disciplina</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($disciplinas as $disciplina)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/disciplinas/{{ $disciplina->id }}">{{ $disciplina->nome_disciplina }}</a></td>
                    <td>
                        <a href="/disciplinas/edit/{{ $disciplina->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="/disciplinas/{{ $disciplina->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Não há disciplinas cadastradas, <a href="/disciplinas/cadastro">Cadastrar Disciplina</a></p>
    @endif
</div>

@endsection