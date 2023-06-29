<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Rules\UserPassword;
use App\Http\Requests\UsuarioRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Request $request)
     {  
	    $users =  User::all();
        return view('users.index', compact('users'));
    }

    public function create()    
    {
        $user = (new User);
        $roles = Role::orderBy('display_name', 'asc')->get();
        return view('users.create', compact('roles','user'));
    }

    public function store(UserRequest $request)
    {
        $this->validate($request, ['password' => new UserPassword($request->reclave)]);
        $user = (new User);
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->attach($request->roles);
        return redirect()->route('users.index');
        
    }
    public function edit($user)
    {
        $user = User::findOrFail($user);
        $roles = Role::orderBy('display_name', 'asc')->get();
        return view('users.edit', compact('user', 'roles' ));
    }
    public function update(UserRequest $request, $id)
    {   

        $user = User::findOrFail($id);
        $pass = false;
        $user->update();

        $user->roles()->sync($request->roles);
        return redirect()->route('users.index')->with('info', 'Usuario actualizado');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        toast('El usuario ha sido eliminada','info');
        return redirect()->route('users.index');
    }
}
