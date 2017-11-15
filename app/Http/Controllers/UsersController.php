<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Curso;
use App\Categoria;
use App\CursoUser;

class UsersController extends Controller
{

    public function index()
    {
        $Users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('Users.index', [
            'users' => $Users
        ]);
    }

    public function add()
    {
        $cursos = Curso::orderBy('created_at', 'desc')->paginate(10);
        
        foreach ($cursos as $curso) {
            $cat = Categoria::where('id', $curso->categoria_id)->first();
            $curso->categoria = $cat->nome;
        }

        return view('Users.add', ['cursos' => $cursos]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        
        
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;
        $user->save();
        
        $cursos = Curso::orderBy('created_at', 'desc')->paginate(10);
        foreach ($cursos as $curso) {
            $valor = $request->input('curso_'.$curso->curso_id);
            if ( $valor == 'on'){
                $cursoUser = new CursoUser();
                $cursoUser->curso_id = $curso->curso_id;
                $cursoUser->user_id =  $user->id;
                $cursoUser->save();
            }
        }
        return redirect('users')->with('message', 'Adicionado com sucesso!');
    }

    public function edit($id)
    {
        $User = User::findOrFail($id);
        
        $cursos = Curso::orderBy('created_at', 'desc')->paginate(10);
        
        foreach ($cursos as $curso) {
            $cat = Categoria::where('id', $curso->categoria_id)->first();
            $val = CursoUser::where('user_id', $User->id)->where('curso_id',$curso->curso_id)->count();
            $curso->categoria = $cat->nome;
            $curso->val = $val;
        }

        return view('users.edit',['cursos' => $cursos])->with('detailpage', $User);
    }

    public function update(Request $request, $id)
    {
        $User = User::findOrFail($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->email);
        $User->type = $request->type;
        $User->save();
        
        $cursos = Curso::orderBy('created_at', 'desc')->paginate(10);
        foreach ($cursos as $curso) {
            $valor = $request->input('curso_'.$curso->curso_id);
            CursoUser::where('user_id', $User->id)->where('curso_id',$curso->curso_id)->delete();
            if ( $valor == 'on'){
                $cursoUser = new CursoUser();
                $cursoUser->curso_id = $curso->curso_id;
                $cursoUser->user_id =  $User->id;
                $cursoUser->save();
            }
        }
        
        return redirect('users')->with('message', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        return redirect('users')->with('message', 'Deletado com sucesso!');
    }
}
