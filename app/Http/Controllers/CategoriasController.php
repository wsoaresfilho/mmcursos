<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriasRequest;
use App\CategoriasModel;

class CategoriasController extends Controller
{
    public function index()
    {
        $Categorias = CategoriasModel::orderBy('created_at', 'desc')->paginate(10);
        return view('categorias.index',['categorias' => $Categorias]);
    }
  
    public function create()
    {
        return view('Categorias.create');
    }
  
    public function store(CategoriaRequest $request)
    {
        $Categoria = new Categorias;
        $Categoria->name        = $request->name;
        $Categoria->description = $request->description;
        $Categoria->quantity    = $request->quantity;
        $Categoria->price       = $request->price;
        $Categoria->save();
        return redirect()->route('Categorias.index')->with('message', 'Categoria created successfully!');
    }
  
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $Categoria = CategoriasModel::findOrFail($id);
        return view('categorias.edit')->with('detailpage',$Categoria);
    }
  
    public function update(CategoriaRequest $request, $id)
    {
        $Categoria = Categoria::findOrFail($id);
        $Categoria->name        = $request->name;
        $Categoria->description = $request->description;
        $Categoria->quantity    = $request->quantity;
        $Categoria->price       = $request->price;
        $Categoria->save();
        return redirect()->route('Categorias.index')->with('message', 'Categoria updated successfully!');
    }
  
    public function destroy($id)
    {
        $Categoria = Categoria::findOrFail($id);
        $Categoria->delete();
        return redirect()->route('Categorias.index')->with('alert-success','Categoria hasbeen deleted!');
    }
}
