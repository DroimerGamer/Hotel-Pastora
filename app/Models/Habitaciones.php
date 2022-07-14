<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitaciones extends Model
{
    protected $table = 'habitaciones';

    protected $primaryKey = 'id_habitacion';
    public $timestamps = false;
    protected $fillable = [
        'id_habitacion',
        'numero',
        'tipo',
        'estado',
        'disponible'
    ];

    public function Reservas()
    {
        return $this->belongsTo('App\Models\Reservas', 'id_reservacion');
    }

}
