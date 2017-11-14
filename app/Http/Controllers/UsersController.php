<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        return view('Users.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        
        $produtos = new User();
        $produtos->name = $request->name;
        $produtos->email = $request->email;
        $produtos->password = bcrypt($request->password);
        $produtos->type = $request->type;
        $produtos->save();
        return redirect('users')->with('message', 'Adicionado com sucesso!');
    }

    public function edit($id)
    {
        $User = User::findOrFail($id);
        return view('users.edit')->with('detailpage', $User);
    }

    public function update(Request $request, $id)
    {
        $User = User::findOrFail($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->email);
        $User->type = $request->type;
        $User->save();
        return redirect('users')->with('message', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        return redirect('users')->with('message', 'Deletado com sucesso!');
    }
}
