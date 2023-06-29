<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NoticiaRequest;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(Request $request)
     {  
        $noticias =  Noticia::filter($request->get('name'),($request->has('inactivos') ? true : false))->orderBy('created_at', 'desc')->get();
        return view('noticias.index', compact('noticias'));
    }
    public function create()    
    {
        $noticia = (new Noticia);
        return view('noticias.create',compact('noticia'));
    }
    public function store(NoticiaRequest $request)
    {
        $noticia = (new Noticia)->fill($request->all());
        $noticia->user_carga_id =  Auth::id();
        $noticia->fecha = Carbon::now();
        $noticia->save();
        return redirect()->route('noticias.index');
    }
    public function show($id)
    {
        return view('noticias.show');
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.edit', compact('noticia'));
    }
    public function update(NoticiaRequest $request, $id)
    {   
        
        $noticia = Noticia::findOrFail($id);
        $noticia->fill($request->all());
        $noticia->user_carga_id =  Auth::id();
        $noticia->update();
        return redirect()->route('noticias.index')->with('info', 'Noticia actualizado');
    }
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        if($noticia->state == 'Activo'){
            $noticia->state = 1;
            $noticia->update();
        }else{
            $noticia->state = 0;
            $noticia->update();
        }
        $response = array();
        $response['status']='success';
        $response['msg']='La Noticia ha sido eliminado correctamente ';

        return $response;
    }
    public function uploadImage(Request $request){
        if($request->file('imagen')){
            $path = 'images/'.Storage::disk('public')->put('news', $request->file('imagen'));
            return  asset($path);
        }
    }
}
