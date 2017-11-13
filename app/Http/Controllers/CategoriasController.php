<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        $Categorias = Categoria::orderBy('created_at', 'desc')->paginate(10);
        return view('categorias.index',['categorias' => $Categorias]);
    }

    public function add()
    {
        return view('categorias.add');
    }



     public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        $produtos = new Categoria;
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->save();
        return redirect('categorias')->with('message', 'Adicionado com sucesso!');

    }


       public function edit($id)
    {
        $Categoria = Categoria::findOrFail($id);
        return view('categorias.edit')->with('detailpage',$Categoria);
    }

    public function update(Request $request, $id)
    {
        $Categoria = Categoria::findOrFail($id);
        $Categoria->nome        = $request->nome;
        $Categoria->descricao = $request->descricao;
        $Categoria->save();
        return redirect('categorias')->with('message', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $Categoria = Categoria::findOrFail($id);
        $Categoria->delete();
        return redirect('categorias')->with('message','Deletado com sucesso!');
    }
}
