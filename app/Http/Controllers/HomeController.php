<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CursoUser;
use App\Curso;

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

        return view('aulas.cursos', ['cursos' => $cursos]);
    }
}
