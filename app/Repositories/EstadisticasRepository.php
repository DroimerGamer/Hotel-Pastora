<?php
namespace App\Repositories;

use DB;
date_default_timezone_set('America/Mexico_City');

class EstadisticasRepository{

    public function r_pendiente($mes){
        $data = DB::table('reserva')
        ->select(DB::raw('count(*) as cant_pe'))
        ->where([['estado_reserva','=','Pendiente'],['fecha_entrada', 'like', date("20y")."-$mes-%"]])
        ->first();

        return $data->cant_pe;
    }

    public function r_confirmada($mes){
        $data = DB::table('reserva')
        ->select(DB::raw('count(*) as cant_confirmada'))
        ->where([['estado_reserva','=','Confirmada'],['fecha_entrada', 'like', date("20y")."-$mes-%"]])
        ->first();

        return $data->cant_confirmada;
    }

    public function r_realizada($mes){
        $data = DB::table('reserva')
        ->select(DB::raw('count(*) as cant_real'))
        ->where([['estado_reserva','=','Realizada'],['fecha_entrada', 'like', date("20y")."-$mes-%"]])
        ->first();

        return $data->cant_real;
    }

    public function r_pospuesta($mes){
        $data = DB::table('reserva')
        ->select(DB::raw('count(*) as cant_pos'))
        ->where([['estado_reserva','=','Pospuesta'],['fecha_entrada', 'like', date("20y")."-$mes-%"]])
        ->first();

        return $data->cant_pos;
    }

    public function r_tipo1($mes){
        $data = DB::table('reserva')
        ->select(DB::raw('count(*) as cant_t1'))
        ->where([['tipo','=','Tipo 1'],['fecha_entrada', 'like', date("20y")."-$mes-%"],['estado_reserva', '=', 'Realizada']])
        ->first();

        return $data->cant_t1;
    }

    public function r_tipo1P($mes){
        $data = DB::table('reserva')
        ->select(DB::raw('count(*) as cant_t1P'))
        ->where([['tipo','=','Tipo 1 - Premium'],['fecha_entrada', 'like', date("20y")."-$mes-%"],['estado_reserva', '=', 'Realizada']])
        ->first();

        return $data->cant_t1P;
    }

    public function r_tipo2($mes){
        $data = DB::table('reserva')
        ->select(DB::raw('count(*) as cant_t2'))
        ->where([['tipo','=','Tipo 2'],['fecha_entrada', 'like', date("20y")."-$mes-%"],['estado_reserva', '=', 'Realizada']])
        ->first();

        return $data->cant_t2;
    }

    public function r_tipo3($mes){
        $data = DB::table('reserva')
        ->select(DB::raw('count(*) as cant_t3'))
        ->where([['tipo','=','Tipo 3'],['fecha_entrada', 'like', date("20y")."-$mes-%"],['estado_reserva', '=', 'Realizada']])
        ->first();

        return $data->cant_t3;
    }

    public function r_tipoP($mes){
        $data = DB::table('reserva')
        ->select(DB::raw('count(*) as cant_tP'))
        ->where([['tipo','=','Tipo Premium'],['fecha_entrada', 'like', date("20y")."-$mes-%"],['estado_reserva', '=', 'Realizada']])
        ->first();

        return $data->cant_tP;
    }
}