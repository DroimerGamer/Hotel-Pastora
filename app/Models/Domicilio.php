<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table = 'domicilio';

    protected $primaryKey = 'id_domicilio';
    public $timestamps = false;
    protected $fillable = [
        'id_domicilio',
        'ciudad',
        'estado',
        'cp',
        'colonia',
        'calle',
        'numero'
    ];

    public function Persona()
    {
        return $this->belongsTo('App\Models\Persona', 'id_persona');
    }
}