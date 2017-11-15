<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Categoria;

class CursosController extends Controller
{

    public function index()
    {
        $cursos = Curso::orderBy('created_at', 'desc')->paginate(10);

        foreach ($cursos as $curso) {
            $cat = Categoria::where('id', $curso->categoria_id)->first();
            $curso->categoria = $cat->nome;
        }
        return view('cursos.index', [
            'cursos' => $cursos
        ]);
    }

    public function add()
    {
        $categorias = Categoria::all();
        return view('cursos.add', [
            'categorias' => $categorias
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'categoria' => 'numeric|required',
            'image' => 'required|max:900000',
            'descricao' => 'required'
        ]);

        $curso = new Curso();

        $image = $request->file('image');
        $imagename = "";
        if(isset($arquivo)) {
            $imagename = $arquivo->getClientOriginalName();
            $destinationPath = public_path('/images');
            $arquivo->move($destinationPath, $imagename);
        }

        $curso->url = $imagename;
        $curso->nome = $request->nome;
        $curso->categoria_id = $request->categoria;
        $curso->descricao = $request->descricao;
        $curso->save();

        return redirect('cursos')->with('message', 'Adicionado com sucesso!');
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $categorias = Categoria::all();

        return view('cursos.edit', [
            'curso' => $curso,
            'categorias' => $categorias
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'categoria' => 'numeric|required',
            'image' => 'required|max:900000',
            'descricao' => 'required'
        ]);

        $curso = Curso::findOrFail($id);

        $image = $request->file('image');
        $imagename = "";
        if(isset($arquivo)) {
            $imagename = $arquivo->getClientOriginalName();
            $destinationPath = public_path('/images');
            $arquivo->move($destinationPath, $imagename);
        }

        $curso->nome = $request->nome;
        $curso->descricao = $request->descricao;
        $curso->categoria_id = $request->categoria;
        $curso->url = $imagename;
        $curso->save();
        return redirect('cursos')->with('message', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return redirect('cursos')->with('message', 'Deletado com sucesso!');
    }
}
