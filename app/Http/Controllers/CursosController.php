<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class CursosController extends Controller
{
    public function index()
    {
        $Cursos = Curso::orderBy('created_at', 'desc')->paginate(10);
        return view('cursos.index',['cursos' => $Cursos]);
    }

    public function add()
    {
        return view('cursos.add');
    }



     public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        $produtos = new Curso;
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->save();
        return redirect('cursos')->with('message', 'Adicionado com sucesso!');

    }


       public function edit($id)
    {
        $Categoria = Curso::findOrFail($id);
        return view('cursos.edit')->with('detailpage',$Categoria);
    }

    public function update(Request $request, $id)
    {
        $Curso = Curso::findOrFail($id);
        $Curso->nome        = $request->nome;
        $Curso->descricao = $request->descricao;
        $Curso->save();
        return redirect('cursos')->with('message', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $Curso = Curso::findOrFail($id);
        $Curso->delete();
        return redirect('cursos')->with('message','Deletado com sucesso!');
    }
}
