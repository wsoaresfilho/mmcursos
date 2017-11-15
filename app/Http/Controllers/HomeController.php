<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CursoUser;
use App\Curso;
use App\Categoria;
use App\Conteudo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dash()
    {
        $cursos_ids = CursoUser::where('user_id', Auth::id())->pluck('curso_id');
        $cursos = Curso::whereIn('curso_id', $cursos_ids)->get();

        foreach ($cursos as $curso) {
            $cat = Categoria::where('id', $curso->categoria_id)->first();
            $curso->categoria = $cat->nome;
        }

        return view('aulas.cursos', ['cursos' => $cursos]);
    }

    public function aulas($curso_id, $conteudo_id)
    {
        $curso = Curso::findOrFail($curso_id);

        $conteudos = Conteudo::where('curso_id', $curso_id)->get();

        $aula = Conteudo::findOrFail($conteudo_id);

        return view('aulas.aulas', ['curso' => $curso, 'conteudos' => $conteudos, 'aula' => $aula]);
    }
}
