<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    protected $table = 'empleo';

    protected $primaryKey = 'id_empleo';
    public $timestamps = false;
    protected $fillable = [
        'id_empleo',
        'puesto',
        'horario_entrada',
        'horario_salida'
    ];
}