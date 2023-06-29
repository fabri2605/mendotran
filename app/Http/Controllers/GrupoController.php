<?php

namespace App\Http\Controllers;
use DB;
use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GrupoRequest;

class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Request $request)
     {  
	    $grupos =  Grupo::filter($request->get('name'),($request->has('inactivos') ? true : false))->get();
        return view('grupos.index', compact('grupos'));
    }

    public function create()    
    {
        $grupo = (new Grupo);
        return view('grupos.create', compact('grupo'));
    }

    public function store(GrupoRequest $request)
    {
        $grupo = (new Grupo)->fill($request->all());
        $grupo->user_carga_id =  Auth::id();
        $grupo->save();
        return redirect()->route('grupos.index');
    }
    public function edit($id)
    {
        $grupo = Grupo::findOrFail($id);
        return view('grupos.edit', compact('grupo'));
    }
    public function update(GrupoRequest $request, $id)
    {   
        $grupo = Grupo::findOrFail($id);
        $grupo->update($request->all());
        $grupo->user_carga_id =  Auth::id();
        return redirect()->route('grupos.index')->with('info', 'Grupo actualizado');
    }
    public function destroy($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->state = 1;
        $grupo->update();
        return redirect()->route('grupos.index')->with('info', 'Grupo eliminado');
    }
}
