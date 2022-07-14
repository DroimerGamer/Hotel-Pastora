<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EstadisticasRepository;

class EstadisticasController extends Controller
{
    private $estadistica;

    public function __construct(EstadisticasRepository $stats){
        $this->estadistica = $stats;
    }
    public function index(){
        return view('admin.estadisticas.index');
    }

    public function generar(Request $request){
        //dd($request['por']);
        if($request['por'] == "estado"){
             
        $pendiente = $this->estadistica->r_pendiente($request['mes']);
        $confirmada = $this->estadistica->r_confirmada($request['mes']);
        $realizada = $this->estadistica->r_realizada($request['mes']);
        $pospuesta = $this->estadistica->r_pospuesta($request['mes']);
        if($pendiente == 0 and $confirmada == 0 and $realizada == 0 and $pospuesta == 0)
        return view('admin.alerts.graficador');
        else
        return view('admin.estadisticas.porestado',['pendiente'=>$pendiente, 'confirmada'=>$confirmada, 'realizada'=>$realizada, 'pospuesta'=>$pospuesta]);
        }else{
            $tipo1 = $this->estadistica->r_tipo1($request['mes']);
            $tipo1P = $this->estadistica->r_tipo1P($request['mes']);
            $tipo2 = $this->estadistica->r_tipo2($request['mes']);
            $tipo3 = $this->estadistica->r_tipo3($request['mes']);
            $tipoP = $this->estadistica->r_tipoP($request['mes']);
            if($tipo1 == 0 and $tipo1P == 0 and $tipo2 == 0 and $tipo3 == 0 and $tipoP == 0)
            return view('admin.alerts.graficador');
            else
            return view('admin.estadisticas.portipo',['tipo1'=>$tipo1, 'tipo1P'=>$tipo1P, 'tipo2'=>$tipo2, 'tipo3'=>$tipo3, 'tipoP'=>$tipoP]);
        }
    }

}
