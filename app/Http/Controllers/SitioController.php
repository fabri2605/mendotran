<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Noticia;
use App\Actualizacion;
use App\Punto;
use App\Grupo;
use App\Linea;
use App\RecorridoRuta;
use App\Lugar;
use App\Horario;
use App\Parada;
use App\Evento;
use App\ParadaLinea;
use App\LineaTrasbordo;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use PDF;
use Carbon\Carbon;

class SitioController extends Controller
{
    public function mendotran()
    {
        return view('site.mendotran');
    }
    public function inicio()
    {
        $lastest = Noticia::latest('id')->first();
        return view('site.inicio', compact('lastest'));
    }
    public function puntos()
    {
        return Punto::all();
    }
    public function actualizaciones()
    {
        $actualizaciones = Actualizacion::where('state', '=', '0')->with('grupo')->get();
        $lastest = Noticia::latest('id')->first();
        return view('site.actualizacion', compact('actualizaciones', 'lastest'));
    }
    public function mendo($grupo)
    {
        $url = 'http://168.197.49.140/mirecorrido/app/service/version.php';
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '_managerName=Desvio&_formAction=listByGroup&params=' . $grupo);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function getPuntosCarga()
    {
        $puntos = Punto::all();
        return $puntos;
    }
    public function getGrupos()
    {
        $grupos = Grupo::where('state', '=', 0)->get();
        return $grupos;
    }
    public function getLineas($grupo)
    {
        $lineas = Linea::where('state', '=', 0)->where('grupo_id', '=', $grupo)->orderBy('codigo', 'asc')->get();
        return $lineas;
    }
    public function getRecorrido($linea)
    {
        $recorrido = RecorridoRuta::where('linea_id', '=', $linea)->get();
        return $recorrido;
    }
    public function getRecorridosCercanos($lat, $lng)
    {
        $distance = 1;
        // $lat=-32.8895571;
        // $lng=-68.84483260000002;

        $earthRadius = 6371;
        $return = array();
        $cardinalCoords = array(
            'north' => '0',
            'south' => '180',
            'east' => '90',
            'west' => '270'
        );
        $rLat = deg2rad($lat);
        $rLng = deg2rad($lng);
        $rAngDist = $distance / $earthRadius;

        foreach ($cardinalCoords as $name => $angle) {
            $rAngle = deg2rad($angle);
            $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
            $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));
            $return[$name] = array(
                'lat' => (float) rad2deg($rLatB),
                'lng' => (float) rad2deg($rLonB)
            );
        }
        $box = array(
            'min_lat' => $return['south']['lat'],
            'max_lat' => $return['north']['lat'],
            'min_lng' => $return['west']['lng'],
            'max_lng' => $return['east']['lng']
        );


        $recorridos = DB::table('recorrido_rutas')
            ->select(DB::raw(' *, (6371 * ACOS( SIN(RADIANS(lat)) * SIN(RADIANS(' . $lat . ')) + ' .
                'COS(RADIANS(lng - ' . $lng . ')) * COS(RADIANS(lat)) ' .
                '* COS(RADIANS(' . $lat . ')) ' .
                ') ) AS distance '))
            ->whereRaw('(lat BETWEEN ' . $box['min_lat'] . ' AND ' . $box['max_lat'] . ') ' .
                'AND (lng BETWEEN ' . $box['min_lng'] . ' AND ' . $box['max_lng'] . ') ' .
                'HAVING distance  < ' . $distance . '')
            ->orderBy('distance', 'asc')
            ->get();

        //
        $lineas = array();
        foreach ($recorridos as $recorrido) {
            array_push($lineas, $recorrido->linea_id);
        }

        $lineasUnicas = array_unique($lineas);

        return Linea::select('id', 'codigo', 'denominacion')->where('state', '=', 0)->whereIn('id', $lineasUnicas)->orderBy('codigo', 'asc')->get();
    }
    public function getRecorridosCercanosDistancia($lat, $lng, $dis)
    {
        $distance = $dis;
        // $lat=-32.8895571;
        // $lng=-68.84483260000002;

        $earthRadius = 6371;
        $return = array();
        $cardinalCoords = array(
            'north' => '0',
            'south' => '180',
            'east' => '90',
            'west' => '270'
        );
        $rLat = deg2rad($lat);
        $rLng = deg2rad($lng);
        $rAngDist = $distance / $earthRadius;

        foreach ($cardinalCoords as $name => $angle) {
            $rAngle = deg2rad($angle);
            $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
            $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));
            $return[$name] = array(
                'lat' => (float) rad2deg($rLatB),
                'lng' => (float) rad2deg($rLonB)
            );
        }
        $box = array(
            'min_lat' => $return['south']['lat'],
            'max_lat' => $return['north']['lat'],
            'min_lng' => $return['west']['lng'],
            'max_lng' => $return['east']['lng']
        );


        $recorridos = DB::table('recorrido_rutas')
            ->select(DB::raw(' *, (6371 * ACOS( SIN(RADIANS(lat)) * SIN(RADIANS(' . $lat . ')) + ' .
                'COS(RADIANS(lng - ' . $lng . ')) * COS(RADIANS(lat)) ' .
                '* COS(RADIANS(' . $lat . ')) ' .
                ') ) AS distance '))
            ->whereRaw('(lat BETWEEN ' . $box['min_lat'] . ' AND ' . $box['max_lat'] . ') ' .
                'AND (lng BETWEEN ' . $box['min_lng'] . ' AND ' . $box['max_lng'] . ') ' .
                'HAVING distance  < ' . $distance . '')
            ->orderBy('distance', 'asc')
            ->get();

        //
        $lineas = array();
        foreach ($recorridos as $recorrido) {
            array_push($lineas, $recorrido->linea_id);
        }

        $lineasUnicas = array_unique($lineas);

        return Linea::select('id', 'codigo', 'denominacion', 'descripcion')->where('state', '=', 0)->whereIn('id', $lineasUnicas)->with('recorrido')->orderBy('codigo', 'asc')->get();
    }
    public function getParadasCercanas($lat, $lng)
    {
        $distance = 1;
        // $lat=-32.8895571;
        // $lng=-68.84483260000002;

        $earthRadius = 6371;
        $return = array();
        $cardinalCoords = array(
            'north' => '0',
            'south' => '180',
            'east' => '90',
            'west' => '270'
        );
        $rLat = deg2rad($lat);
        $rLng = deg2rad($lng);
        $rAngDist = $distance / $earthRadius;

        foreach ($cardinalCoords as $name => $angle) {
            $rAngle = deg2rad($angle);
            $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
            $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));
            $return[$name] = array(
                'lat' => (float) rad2deg($rLatB),
                'lng' => (float) rad2deg($rLonB)
            );
        }
        $box = array(
            'min_lat' => $return['south']['lat'],
            'max_lat' => $return['north']['lat'],
            'min_lng' => $return['west']['lng'],
            'max_lng' => $return['east']['lng']
        );


        $paradas = DB::table('paradas')
            ->select(DB::raw(' *, (6371 * ACOS( SIN(RADIANS(lat)) * SIN(RADIANS(' . $lat . ')) + ' .
                'COS(RADIANS(lng - ' . $lng . ')) * COS(RADIANS(lat)) ' .
                '* COS(RADIANS(' . $lat . ')) ' .
                ') ) AS distance '))
            ->whereRaw('(lat BETWEEN ' . $box['min_lat'] . ' AND ' . $box['max_lat'] . ') ' .
                'AND (lng BETWEEN ' . $box['min_lng'] . ' AND ' . $box['max_lng'] . ') ' .
                'HAVING distance  < ' . $distance . '')
            ->orderBy('distance', 'asc')
            ->get();

        //
        foreach ($paradas as $parada) {
            $lineas = ParadaLinea::select('linea_id')->where('parada_id', '=', $parada->id)->get();
            $parada->lineas = Linea::select('id', 'codigo', 'denominacion')->where('state', '=', 0)->whereIn('id', $lineas)->get();
        }
        return $paradas;
    }
    public function getRecorridoXLinea($linea)
    {
        return RecorridoRuta::where('linea_id', '=', $linea)->get();
    }
    public function getRecorridoXLineaXParada($linea)
    { //
        $response = array();
        $response['recorrido'] = RecorridoRuta::where('linea_id', '=', $linea)->get();
        $response['stops'] = ParadaLinea::where('linea_id', '=', $linea)->with('parada', 'linea')->get();
        return $response;
    }

    public function getRecorridosHorarios()
    {
        $lineas = Linea::select('id', 'codigo', 'denominacion', 'descripcion', 'grupo_id')
            ->where('state', '=', 0)->orderBy('codigo', 'asc')->get();
        return view('site.reco', compact('lineas'));
    }
    public function getRecorridosHorariosPrueba()
    {
        $proxy = 'http://proxy.mendoza.gov.ar:8080';
        $url = 'https://ssl.visionblo.com/mendotran/?servicios=all&descripcion=1&token=er2b6+nWYpzfIqLYzi+sWhkIkppjUwmuPNE6rro2DeAl';

        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        if (getenv('APP_DEBUG') === 'false') {
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result, true);

        $lineas = array();
        foreach ($data as $item) {
            $lineas[] = $item["linea"]; //any object field
        }

        array_multisort($lineas, SORT_ASC, $data);

        Session::put('recorridos', $data);

        return view('site.reco2', compact('data'));
    }
    public function getPlaces($tipo)
    {
        return Lugar::where('state', '=', 0)
            ->where('tipo', '=', $tipo)
            ->orderBy('denominacion', 'asc')->limit(30)->get();
    }
    public function getTrasbordos()
    {
        return LineaTrasbordo::with('linea')->get();
    }
    public function paradasXLinea($linea)
    {
        return ParadaLinea::with('parada')->where('linea_id', '=', $linea)->get();
    }
    public function getLastVersion()
    {
        $all = Linea::select('id', 'codigo', 'denominacion')->where('state', '=', 0)->with('recorrido')->paginate();
        return $all;
    }
    public function getLocation()
    {
        $response = array();
        $response['lat'] = -32.8676442;
        $response['lng'] = -68.7869539;
        return $response;
    }
    public function escuelas(Request $request)
    {
        if ($request->has('search')) {
            $resultados = Lugar::filter($request->get('search'), false)
                ->where('tipo', '=', 'E')
                ->paginate(10);
        } else {
            $resultados = array();
        }



        $capital = Lugar::where('tipo', '=', 'E')->where('depto', '=', 'CAPITAL')->paginate(10);
        $godoycruz = Lugar::where('tipo', '=', 'E')->where('depto', '=', 'GODOY CRUZ')->paginate(10);
        $guaymallen = Lugar::where('tipo', '=', 'E')->where('depto', '=', 'GUAYMALLEN')->paginate(10);
        $lasheras = Lugar::where('tipo', '=', 'E')->where('depto', '=', 'LAS HERAS')->paginate(10);
        $lujan = Lugar::where('tipo', '=', 'E')->where('depto', '=', 'LUJAN DE CUYO')->paginate(10);
        $maipu = Lugar::where('tipo', '=', 'E')->where('depto', '=', 'MAIPU')->paginate(10);

        return view('escuelas.escuelas', compact('capital', 'godoycruz', 'guaymallen', 'lasheras', 'lujan', 'maipu', 'resultados'));
    }
    public function municipios(Request $request)
    {
        if ($request->has('search')) {
            $resultados = Lugar::filter($request->get('search'), false)
                ->where('tipo', '=', 'M')
                ->paginate(10);
        } else {
            $resultados = array();
        }
        $municipios = Lugar::where('tipo', '=', 'M')->paginate(10);
        return view('municipios.municipios', compact('municipios', 'resultados'));
    }
    public function hospitales(Request $request)
    {
        if ($request->has('search')) {
            $resultados = Lugar::filter($request->get('search'), false)
                ->where('tipo', '=', 'H')
                ->paginate(10);
        } else {
            $resultados = array();
        }
        $hospitales = Lugar::where('tipo', '=', 'H')->paginate(10);
        return view('hospitales.hospitales', compact('hospitales', 'resultados'));
    }
    public function escuelaFiltro(Request $request, $data)
    {
        $resultados = array();
        if ($data != 'none') {
            $resultados = Lugar::filter($data, false)->where('tipo', '=', 'E')
                ->where('state', '=', 0)->paginate(10);
        } else {
            $resultados = Lugar::where('tipo', '=', 'E')->where('state', '=', 0)->paginate(10);
        }

        return $resultados;
    }
    public function escuelaDetalle(Request $request, $data)
    {
        $escuela = Lugar::select(
            'id',
            'denominacion',
            'codigo',
            'locacion',
            'depto',
            'barrio',
            'descripcion',
            'nivel',
            'subtipo',
            'lat',
            'lng'
        )->findOrFail($data);

        //return $escuela;
        return view('escuelas.detalle', compact('escuela'));
    }
    public function hospitalDetalle(Request $request, $data)
    {
        $hospital = Lugar::select('id', 'denominacion', 'lat', 'lng')->findOrFail($data);
        return view('hospitales.detalle', compact('hospital'));
    }
    public function municipioDetalle(Request $request, $data)
    {
        $municipio = Lugar::select('id', 'denominacion', 'lat', 'lng')->findOrFail($data);
        return view('municipios.detalle', compact('municipio'));
    }
    public function escuelaMap(Request $request, $data)
    {
        $escuela = Lugar::with('complete')->findOrFail($data);
        return $escuela;
    }
    public function recorridos()
    {
        return view('site.mendotran');
    }
    public function recorridosListado()
    {
        $listado = Linea::select('id', 'denominacion', 'codigo', 'descripcion')->where('state', '=', 0)->orderBy('codigo', 'asc')->get();
        return $listado;
    }
    public function recorridoDetalle($data)
    {
        $recorrido = Linea::select('id', 'denominacion', 'codigo', 'descripcion')
            ->where('state', '=', 0)
            ->where('id', '=', $data)
            ->with('recorrido')
            ->first();
        return $recorrido;
    }
    public function troncalTransbordo()
    {
        $trasbordos = LineaTrasbordo::with('linea')->get();
        return view('site.trasbordos', compact('trasbordos'));
    }
    public function getRecorridoDetalle(Request $request, $id)
    {
        $recorridos = Session::get('recorridos');

        $linea = null;
        foreach ($recorridos as $item) {
            if ($item["servicio_id"] == $id) {
                $linea = $item;
                break;
            }
        }

        #BUSCO EN WARA
        $proxy = 'http://proxy.mendoza.gov.ar:8080';
        $url = 'https://ssl.visionblo.com/mendotran/?servicio_id=' . $id . '&descripcion_traza=1&token=er2b6+nWYpzfIqLYzi+sWhkIkppjUwmuPNE6rro2DeAl&traza=1';

        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($result, true);

        if ($data) {
            $linea["descripcion"] = $data["descripcion_traza_autorizada"];
            $linea["traza"] = $data["traza"];
        }

        $sisline = Linea::where("codigo", $linea["linea"])->first();

        $habil = $this->getServicioId($linea["linea"], 'habil');
        $sabado = $this->getServicioId($linea["linea"], 'sabado');
        $domingo = $this->getServicioId($linea["linea"], 'domingo');
        $etapas = array();

        $cdomingo = count($domingo);
        $csabado = count($sabado);
        $chabil = count($habil);

        return view('lrecorridos.detalle', compact('sisline', 'linea', 'habil', 'sabado', 'domingo', 'etapas', 'cdomingo', 'csabado', 'chabil'));
    }
    public function getHoariosXLineaApp($codigo)
    {
        $linea = Linea::where('codigo', '=', $codigo)->first();
        $habil = $this->getServicioId($linea->codigo, 'habil');
        $sabado = $this->getServicioId($linea->codigo, 'sabado');
        $domingo = $this->getServicioId($linea->codigo, 'domingo');


        $horarios = array();
        if (count($habil) > 0)
            $horarios['habil'] = $habil;
        if (count($sabado) > 0)
            $horarios['sabado'] = $sabado;
        if (count($domingo) > 0)
            $horarios['domingo'] = $domingo;


        return $horarios;
    }
    public function recorridoMap(Request $request, $id)
    {
        $linea = RecorridoRuta::select('lat', 'lng')->where('linea_id', '=', $id)->get();
        return $linea;
    }
    public function lugaresInteres()
    {
        $hospitales = Lugar::where('state', '=', 0)->where('tipo', '=', 'H')->paginate(10);
        $municipios = Lugar::where('state', '=', 0)->where('tipo', '=', 'M')->paginate(10);

        return view('places.listado', compact('hospitales', 'municipios'));
    }
    public function placeDetalle(Request $request, $data)
    {
        $place = Lugar::select(
            'id',
            'denominacion',
            'descripcion',
            'tipo',
            'lat',
            'lng'
        )->findOrFail($data);

        return view('places.detalle', compact('place'));
    }
    public function getHorarios(Request $request, $data)
    {
        $response = array();
        $response['habil'] = Horario::where('linea_id', '=', $data)
            ->where('semana', '=', '1')
            ->orderBy('frecuencia', 'asc')
            ->orderBy('orden', 'asc')->get();
        $response['sabado'] = Horario::where('linea_id', '=', $data)
            ->where('semana', '=', '2')
            ->orderBy('frecuencia', 'asc')
            ->orderBy('orden', 'asc')->get();
        $response['domingo'] = Horario::where('linea_id', '=', $data)
            ->where('semana', '=', '3')
            ->orderBy('frecuencia', 'asc')
            ->orderBy('orden', 'asc')->get();

        return $response;
    }
    public function reporteHorario(Request $request, $data, $tipo)
    {
        $horario = array();
        $horario['fecha'] = "15/04/2019";
        $label = "Horario ";
        $horario['linea'] = Linea::select('codigo', 'descripcion', 'denominacion', 'id')->where('id', '=', $data)->first();
        $horario['etapas'] = DB::table('horarios')
            ->select(DB::raw('etapa'))
            ->where('linea_id', '=', $data)
            ->groupBy('orden')
            ->get();

        if ($tipo == 1) {
            $label .= "habil";
            $horario['tipo'] = "DIAS HABILES";
            $horario['detalle'] = Horario::where('linea_id', '=', $data)
                ->where('semana', '=', '1')
                ->orderBy('frecuencia', 'asc')
                ->orderBy('orden', 'asc')->get();
        } else if ($tipo == 2) {
            $label .= "sábado";
            $horario['tipo'] = "DIAS SABADOS";
            $horario['detalle'] = Horario::where('linea_id', '=', $data)
                ->where('semana', '=', '2')
                ->orderBy('frecuencia', 'asc')
                ->orderBy('orden', 'asc')->get();
        } else {
            $label .= "domingo";
            $horario['tipo'] = "DIAS DOMINGOS";
            $horario['detalle'] = Horario::where('linea_id', '=', $data)
                ->where('semana', '=', '3')
                ->orderBy('frecuencia', 'asc')
                ->orderBy('orden', 'asc')->get();
        }
        $pdf = PDF::loadView('horarios.reporte', compact('horario'));

        return $pdf->stream($label . '.pdf');
    }
    public function eventosProvinciales(Request $request)
    {
        if ($request->has('search')) {
            $resultados = Evento::filter($request->get('search'))
                ->paginate(10);
        } else {
            $resultados = array();
        }
        $eventos = Evento::paginate(10);
        return view('eventos.eventos', compact('eventos', 'resultados'));
    }
    public function eventoDetalle(Request $request, $data)
    {
        $evento = Evento::select('id', 'denominacion', 'descripcion', 'lat', 'lng')->findOrFail($data);
        return view('eventos.detalle', compact('evento'));
    }
    public function getNoticias($actual, $limit)
    {
        $currentPage = $actual;
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        $noticias = Noticia::orderBy('id', 'desc')->paginate($limit);
        return $noticias;
    }
    public function validarToken()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['token'])) {
            if (isset($_SESSION['token_request'])) {
                $now = Carbon::now();
                $lastupdate = Carbon::parse($_SESSION['token_request'])->addMinutes(10);
                if ($now->gt($lastupdate)) {
                    return $this->obtenerToken();
                } else {
                    return $_SESSION['token'];
                }
            } else {
                return $this->obtenerToken();
            }
        } else {
            return $this->obtenerToken();
        }
    }
    public function obtenerToken()
    {
        $proxy = 'http://proxy.mendoza.gov.ar:8080';

        $data = array(
            'user' => 'apihorarios',
            'password' => 'Hora2020renzo',
            'maxIdle' => '12m'
        );
        $payload = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://apps.visionblo.com/rb/app/api/CreateSessionToken");
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_HEADER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POST, TRUE);

        $result = curl_exec($ch);
        $data = json_decode($result, true);

        $_SESSION['token'] = $data['SessionToken'];
        $_SESSION['token_request'] = Carbon::now();

        // Close cURL resource
        curl_close($ch);
        return $_SESSION['token'];
    }
    public function probandoHorarios()
    {
        return $this->getServicioId('100');
    }
    public function getServicioId($linea, $dia)
    {
        $proxy = 'http://proxy.mendoza.gov.ar:8080';
        $token = $this->validarToken();

        Log::info(Carbon::now()->toDateTimeString() . '  Tokken Obtenido ' . $token);

        $data = array(
            'token' => $token,
            'servicio' => $linea,
        );

        Log::info(Carbon::now()->toDateTimeString() . '  Línea buscada ' . $linea);

        $payload = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://apps.visionblo.com/rb/app/api/ConsultarServicio");
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        // SSL important
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POST, TRUE);

        //dd($payload);
        $result = curl_exec($ch);
        $data = json_decode($result, true);



        return $this->obtenerHorariosxLinea($data['servicios'][0]['id'], $dia);
    }
    public function obtenerHorariosxLinea($linea, $dia)
    {
        //$proxy = 'http://proxy.mendoza.gov.ar:8080';
        $data = array(
            'token' => $_SESSION['token'],
            'servicio_id' => $linea,
            "dia" => $dia,
            "temporada" => env("WARA_HORARIO", 'invierno')
        );

        $payload = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://apps.visionblo.com/rb/app/api/PlanillaHorarios");
        //curl_setopt($ch, CURLOPT_PROXY, $proxy);
        // SSL important
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        /*  dd($payload); */
        $result = curl_exec($ch);
        $data = json_decode($result, true);


        return $data;
    }
}
