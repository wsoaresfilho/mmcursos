<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conteudo;

class ConteudosController extends Controller
{
    public function index()
    {
        $conteudos = Conteudo::orderBy('created_at', 'desc')->paginate(10);
        return view('conteudos.index',['conteudos' => $conteudos]);
    }

    public function add()
    {
        return view('conteudos.add');
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
        $conteudo->save();
        return redirect('conteudos')->with('message', 'Adicionado com sucesso!');

    }


       public function edit($id)
    {
        $conteudo = Conteudo::findOrFail($id);
        return view('conteudos.edit')->with('detailpage',$conteudo);
    }

    public function update(Request $request, $id)
    {
        $conteudo = Conteudo::findOrFail($id);
        $conteudo->nome = $request->nome;
        $conteudo->descricao = $request->descricao;
        $conteudo->arquivo = $request->arquivo;
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
