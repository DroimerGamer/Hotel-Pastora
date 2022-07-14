<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table = 'reservacion';

    protected $primaryKey = 'id_reservacion';
    public $timestamps = false;
    protected $fillable = [
        'id_reservacion',
        'id_cliente',
        'fecha_entrada',
        'fecha_salida',
        'hora_entrada',
        'hora_salida',
        'cant_personas',
        'estado',
        'id_habitacion',
        'created_by',
        'last_modification_by'
    ];

    public function Cliente()
    {
        return $this->hasMany('App\Models\Cliente', 'id_cliente');
    }

    public function Habitaciones()
    {
        return $this->hasMany('App\Models\Habitaciones', 'id_habitacion');
    }
}
