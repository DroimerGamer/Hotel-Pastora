<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';

    protected $primaryKey = 'id_persona';
    public $timestamps = false;
    protected $fillable = [
        'id_persona',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'edad',
        'telefono',
        'id_domicilio'
    ];

    public function Domicilio()
    {
        return $this->hasOne('App\Models\Domicilio', 'id_domicilio');
    }

    public function Cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente');
    }
}