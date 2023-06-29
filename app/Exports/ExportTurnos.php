<?php

namespace App\Exports;

use App\Turno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Carbon\Carbon;
class ExportTurnos implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $fecha_desde;
    protected $fecha_hasta;
    protected $tramite;
    public function __construct($fd, $fh, $tramite)
    {
        $this->tramite = $tramite; 
        $this->fecha_desde = $fd; 
        $this->fecha_hasta = $fh; 
        
    }
    public function headings(): array
    {
        $columnas =  [
            'NRO TURNO',
            'FECHA TURNO',
            'HORA TURNO',
            'TRAMITE',
            'TIPO DOC',
            'DOCUMENTO',
            'APELLIDO',
            'NOMBRE',
            'TELEFONO',
            'ESTADO',
        ];
        return $columnas;
    }
    public function collection()
    {

        $query = Turno::with('tipo_tramite')
                      ->whereDate('fecha_turno', '<=', $this->fecha_hasta->toDateString())
                      ->whereDate('fecha_turno', '>=', $this->fecha_desde->toDateString());

        if($this->tramite != '*'){
            $query->where('tipo_tramite_id','=', $this->tramite);
        }
        $query->orderBy('turnos.created_at', 'desc');
        $turnos = $query->get();
        if(!empty($turnos)){
            $response = array();
            foreach($turnos as $item){
                $datos =   [
                            'nro' => $item->nro_turno,
                            'fecha' => ($item->fecha_turno ? Carbon::parse($item->fecha_turno)->format('d/m/y') :''),
                            'hora' => $item->hora_turno, 
                            'tramite' => ($item->tipo_tramite ? $item->tipo_tramite->denominacion : ''),
                            'tipo_doc' => $item->tipo_documento,
                            'documento' => $item->documento, 
                            'apellido' => $item->apellido, 
                            'nombre' => $item->nombre,
                            'telefono' => $item->telefono,
                            'estado' => $item->estado, 
                            ];
                
                $aux = collect($datos);
                array_push($response, $aux);
            }
            return collect($response);
        }
        return null;
    }
}
