<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\User;

Class DisciplinaController extends Controller{
    public function index() {

    $search = request('search');
        
        if($search) {

            $disciplinas = Disciplina::where([
                ['nome_disciplina', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $disciplinas = Disciplina::all();
        }        

        return view('welcome',['disciplinas' => $disciplinas, 'search' => $search]);

    }

    public function create() {
        return view('disciplinas.cadastro');
    }

    public function store(Request $request){
        $disciplina = new Disciplina;

        $disciplina->nome_disciplina = $request->nome;
        $disciplina->sigla = $request->sigla;
        $disciplina->cursos = $request->cursos;
        $disciplina->carga_horaria = $request->cargahoraria;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/disciplinas'), $imageName);

            $disciplina->image = $imageName;

        }

        $disciplina->save();

        return redirect('/')->with('msg', 'Disciplina cadastrada com sucesso!');
    }

    public function show($id){
        $disciplina = Disciplina::findOrFail($id);

        return view('disciplinas.show', ['disciplina' => $disciplina]);
    }

    public function edit($id) {

        $disciplina = Disciplina::findOrFail($id);

        return view('disciplinas.edit', ['disciplina' => $disciplina]);

    }

    public function destroy($id) {

        Disciplina::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Disciplina excluída com sucesso!');

    }

    public function update(Request $request) {

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/disciplinas'), $imageName);

            $data['image'] = $imageName;

        }

        Disciplina::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Disciplina editada com sucesso!');

    }

    public function dashboard() {

        $disciplinas = Disciplina::all();

        return view('disciplinas.dashboard',['disciplinas' => $disciplinas]);

    }
}

?>