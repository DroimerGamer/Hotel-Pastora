<?php
/*
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';

    protected $primaryKey = 'id_empleado';
    public $timestamps = false;
    protected $fillable = [
        'id_empleado',
        'id_persona',
        'id_empleo',
        'rfc',
        'nss',
        'nivel_de_estudio',
        'curp'
    ];

    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id_persona');
    }

    public function empleo()
    {
        return $this->hasOne('App\Models\Empleo', 'id_empleo');
    }
}
