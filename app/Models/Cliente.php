<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $primaryKey = 'id_cliente';
    public $timestamps = false;
    protected $fillable = [
        'id_cliente',
        'id_persona',
        'correo_electronico',
        'empresa',
        'automovil'
    ];

    public function Persona()
    {
        return $this->hasOne('App\Models\Persona', 'id_persona');
    }

    public function Reservas()
    {
        return $this->belongsTo('App\Models\Reservas', 'id_reservacion');
    }
}
