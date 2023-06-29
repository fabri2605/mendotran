<?php

namespace App\Http\Controllers;

use App\Parametro;
use Illuminate\Http\Request;
Use Alert;

class ParametroController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function configuracion()
    {
        $parametro = Parametro::where('id', '=', 1)->first();
        if(empty($parametro)){
            $parametro = (new Parametro);
            $parametro->save();
        }
        return view('parametros.configuracion', compact('parametro'));
    }
    public function update(Request $request, $id)
    {
        
        $parametro = Parametro::where('id', '=', 1)->first();
        $parametro->introduccion = $request->get('introduccion');
        $parametro->link_boleto_municipal = $request->get('link_boleto_municipal');
        $parametro->link_boleto_nacional = $request->get('link_boleto_nacional');
        $parametro->direccion = $request->get('direccion');
        $parametro->horario = $request->get('horario');
        $parametro->telefono = $request->get('telefono');
        $parametro->texto_adicional = $request->get('texto_adicional');
        $parametro->restriccion_covid = $request->get('restriccion_covid');
        $parametro->update();
        toast('Se actualizo la configuración','info');
        return view('parametros.configuracion', compact('parametro'));
    }
}
