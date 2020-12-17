<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    protected function show() {
        $cursos = new Curso();
        $cursos = Curso::all();

        return view('quest')      
        ->with('cursos', $cursos);
    }

    protected function update($id) {
        $curso = new Curso();
        $curso = Curso::find($id);
        
        return view('update')
            ->with('curso', $curso);
    }

    protected function updateConf(Request $request) {
        $id = $request->input('id');
        $curso = new Curso();
        $curso = Curso::find($id);

        $curso->nome = $request->input('nome');
        $curso->cursos = $request->input('cursos');
        $curso->sugestao = $request->input('sugestao');

        if($curso->save()) {
            flash('Dados da resposta atualizado com sucesso!')->success();
                return redirect(route('form.show'));
        }
    }

    protected function delete($id) {
        $curso = new Curso();
        $curso = Curso::find($id);

        if($curso->delete()) {
            flash('Dados da resposta apagado com sucesso!')->success();
                return redirect(route('form.show'));
        }
    }
}
