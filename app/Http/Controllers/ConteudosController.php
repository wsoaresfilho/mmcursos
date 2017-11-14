<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conteudo;
use App\Curso;

class ConteudosController extends Controller
{
    public function index()
    {
        $conteudos = Conteudo::orderBy('created_at', 'desc')->paginate(10);

        foreach ($conteudos as $conteudo) {
            $curso = Curso::where('curso_id', $conteudo->curso_id)->first();
            $conteudo->curso = $curso->nome;
        }
        return view('conteudos.index',['conteudos' => $conteudos]);
    }

    public function add()
    {
        $cursos = Curso::all();
        return view('conteudos.add',['cursos' => $cursos]);
    }



     public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'arquivo' => 'required',
            'descricao' => 'required'
        ]);

        $conteudo = new Conteudo;
        $conteudo->nome = $request->nome;
        $conteudo->arquivo = $request->arquivo;
        $conteudo->descricao = $request->descricao;
        $conteudo->curso_id = $request->curso;
        $conteudo->save();
        return redirect('conteudos')->with('message', 'Adicionado com sucesso!');

    }


       public function edit($id)
    {
        $conteudo = Conteudo::findOrFail($id);
        $cursos = Curso::all();

        return view('conteudos.edit', ['conteudo' => $conteudo, 'cursos' => $cursos]);
    }

    public function update(Request $request, $id)
    {
        $conteudo = Conteudo::findOrFail($id);
        $conteudo->nome = $request->nome;
        $conteudo->descricao = $request->descricao;
        $conteudo->arquivo = $request->arquivo;
        $conteudo->curso_id = $request->curso;
        $conteudo->save();
        return redirect('conteudos')->with('message', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $conteudo = Conteudo::findOrFail($id);
        $conteudo->delete();
        return redirect('conteudos')->with('message','Deletado com sucesso!');
    }
}
