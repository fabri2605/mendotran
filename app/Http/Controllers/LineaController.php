<?php

namespace App\Http\Controllers;
use DB;
use App\Linea;
use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LineaRequest;

class LineaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Request $request)
     {  
        $lineas =  Linea::filter($request->get('name'),($request->has('inactivos') ? true : false))->with('grupo')->orderBy('codigo', 'asc')->get();
        return view('lineas.index', compact('lineas'));
    }

    public function create()    
    {
        $linea = (new Linea);
        $grupos = Grupo::where('state','=', 0)->get();
        return view('lineas.create', compact('grupos','linea'));
    }

    public function store(LineaRequest $request)
    {
        $linea = (new Linea)->fill($request->all());
        $linea->user_carga_id =  Auth::id();
        $linea->save();
        return redirect()->route('lineas.index');
        
    }
    public function show($id)
    {
        return view('lineas.show');
    }
    public function edit($id)
    {
        $linea = Linea::findOrFail($id);
        $grupos = Grupo::where('state','=', 0)->get();
        return view('lineas.edit', compact('grupos', 'linea'));
    }
    public function update(LineaRequest $request, $id)
    {   
        
        $linea = Linea::findOrFail($id);
        $linea->fill($request->all());
        $linea->user_carga_id =  Auth::id();
        $linea->update();
        return redirect()->route('lineas.index')->with('info', 'Linea actualizado');
    }
    public function destroy($id)
    {
        $linea = Linea::findOrFail($id);
        if($linea->state == 'Activo'){
            $linea->state = 1;
            $linea->update();
            return redirect()->route('lineas.index')->with('info', 'Linea eliminado');
        }else{
            $linea->state = 0;
            $linea->update();
            return redirect()->route('lineas.index')->with('info', 'Linea activada');
        }
    }
    public function ajxLineas(){
        $lineas = Linea::where('state', '=', 0)->with('grupo')->get();
        return $lineas;
    }
}
