<?php
/*
* Created by VSCODE.
* User: Jesus R.
* Date: 22/07/2022
*/
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(\Auth::check()){
        return redirect('/home');
    }else{
        return redirect()->route('sitio.index');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'sitio'], function(){
    Route::get('/index',[
        'as' => 'sitio.index',
        'uses' => 'LandingController@index'
    ]);

    Route::get('/habitaciones',[
        'as' => 'sitio.habitaciones',
        'uses' => 'LandingController@habitaciones'
    ]);

    Route::get('/contactanos',[
        'as' => 'sitio.contactanos',
        'uses' => 'LandingController@contactanos'
    ]);

    Route::get('/servicios',[
        'as' => 'sitio.servicios',
        'uses' => 'LandingController@servicios'
    ]);

    Route::get('/nosotros',[
        'as' => 'sitio.nosotros',
        'uses' => 'LandingController@nosotros'
    ]);

    Route::get('/reserve',[
        'as' => 'sitio.reserve',
        'uses' => 'LandingController@reserve'
    ]);
   

    
});

Route::group(['prefix' => 'Empleados'], function(){
    Route::get('/index',[
        'as' => 'Empleados.index',
        'uses' => 'EmpleadosController@index'
    ]);
    Route::get('/create',[
        'as' => 'Empleados.create',
        'uses' => 'EmpleadosController@create'
    ]);
    Route::post('/persona',[
        'as' => 'Empleados.persona',
        'uses' => 'EmpleadosController@persona'
    ]);
    
    Route::get('/{id}/delete',[
        'as' => 'Empleados.delete',
        'uses' => 'EmpleadosController@delete'
    ]);
    
    Route::post('/destroy',[
        'as' => 'Empleados.destroy',
        'uses' => 'EmpleadosController@destroy'
    ]);
    Route::get('/{id}/show',[
        'as' => 'Empleados.show',
        'uses' => 'EmpleadosController@show'
    ]);

    Route::get('/{id}/updatePersona',[
        'as' => 'Empleados.update_persona',
        'uses' => 'EmpleadosController@update_persona'
    ]);

    Route::get('/{id}/updateDomicilio',[
        'as' => 'Empleados.update_domicilio',
        'uses' => 'EmpleadosController@update_domicilio'
    ]);

    Route::get('/{id}/updateEmpleo',[
        'as' => 'Empleados.update_empleo',
        'uses' => 'EmpleadosController@update_empleo'
    ]);

    Route::get('/{id}/updateEmpleados',[
        'as' => 'Empleados.update_empleados',
        'uses' => 'EmpleadosController@update_empleados'
    ]);

    Route::put('/{id}/editPersona',[
        'as' => 'Empleados.edit_persona',
        'uses' => 'EmpleadosController@edit_persona'
    ]);
    Route::put('/{id}/editDomicilio',[
        'as' => 'Empleados.edit_domicilio',
        'uses' => 'EmpleadosController@edit_domicilio'
    ]);
    Route::put('/{id}/editEmpleo',[
        'as' => 'Empleados.edit_empleo',
        'uses' => 'EmpleadosController@edit_empleo'
    ]);
    Route::put('/{id}/editEmpleados',[
        'as' => 'Empleados.edit_empleados',
        'uses' => 'EmpleadosController@edit_empleados'
    ]);

});

Route::group(['prefix' => 'error'], function(){
    Route::get('/index',[
        'as' => 'error.index',
        'uses' => 'EmpleadosController@error'
    ]);
});

Route:: group(['prefix' => 'Usuarios'], function(){
    Route::get('/index',[
        'as' => 'Usuarios.index',
        'uses' => 'UsuariosController@index'
    ]);

    Route::get('/create',[
        'as' => 'Usuarios.create',
        'uses' => 'UsuariosController@create'
    ]);

    Route::post('/store',[
        'as' => 'Usuarios.store',
        'uses' => 'UsuariosController@store'
    ]);

    Route::get('/create',[
        'as' => 'Usuarios.create',
        'uses' => 'UsuariosController@create'
    ]);
    Route::get('/{id}/delete',[
        'as' => 'Usuarios.delete',
        'uses' => 'UsuariosController@delete'
    ]);

    Route::post('/destroy',[
        'as' => 'Usuarios.destroy',
        'uses' => 'UsuariosController@destroy'
    ]);
    
    Route::get('/{id}/show',[
        'as' => 'Usuarios.show',
        'uses' => 'UsuariosController@show'
    ]);
});

Route::group(['prefix'=>'reservas'], function(){
    Route::get('/index',[
        'as' => 'reservas.index',
        'uses' => 'ReservasController@index'
    ]);

    Route::get('/index2',[
        'as' => 'reservas.index2',
        'uses' => 'ReservasController@index2'
    ]);


    Route::get('/create',[
        'as' => 'reservas.create',
        'uses' => 'ReservasController@create'
    ]);

    Route::post('/store',[
        'as' => 'reservas.store',
        'uses' => 'ReservasController@store'
    ]);

    Route::get('/{id}/show',[
        'as' => 'reservas.show',
        'uses' => 'ReservasController@show'
    ]);

    Route::get('/{id}/updatePersona',[
        'as' => 'reservas.update_persona',
        'uses' => 'ReservasController@update_persona'
    ]);

    Route::get('/{id}/updateDomicilio',[
        'as' => 'reservas.update_domicilio',
        'uses' => 'ReservasController@update_domicilio'
    ]);

    Route::get('/{id}/updateCliente',[
        'as' => 'reservas.update_cliente',
        'uses' => 'ReservasController@update_cliente'
    ]);

    Route::get('/{id}/updateReserva',[
        'as' => 'reservas.update_reserva',
        'uses' => 'ReservasController@update_reserva'
    ]);

    Route::put('/{id}/editPersona',[
        'as' => 'reservas.edit_persona',
        'uses' => 'ReservasController@edit_persona'
    ]);
    Route::put('/{id}/editDomicilio',[
        'as' => 'reservas.edit_domicilio',
        'uses' => 'ReservasController@edit_domicilio'
    ]);
    Route::put('/{id}/editCliente',[
        'as' => 'reservas.edit_cliente',
        'uses' => 'ReservasController@edit_cliente'
    ]);
    Route::put('/{id}/editReserva',[
        'as' => 'reservas.edit_reserva',
        'uses' => 'ReservasController@edit_reserva'
    ]);

    Route::get('/{id}/delete',[
        'as' => 'reservas.delete',
        'uses' => 'ReservasController@delete'
    ]);

    Route::post('/destroy',[
        'as' => 'reservas.destroy',
        'uses' => 'ReservasController@destroy'
    ]);
});


Route::group(['prefix'=>'estadisticas'], function(){
    Route::get('/index',[
        'as' => 'estadisticas.index',
        'uses' => 'EstadisticasController@index'
    ]);

    Route::post('/generar',[
        'as' => 'estadisticas.generar',
        'uses' => 'EstadisticasController@generar'
    ]);
});

Route::group(['prefix'=>'habitaciones'], function(){
    Route::get('/index',[
        'as' => 'habitaciones.index',
        'uses' => 'HabitacionesController@index'
    ]);

    Route::get('/index2',[
        'as' => 'habitaciones.index2',
        'uses' => 'HabitacionesController@index2'
    ]);

    Route::get('/create',[
        'as' => 'habitaciones.create',
        'uses' => 'HabitacionesController@create'
    ]);

    Route::post('/store',[
        'as' => 'habitaciones.store',
        'uses' => 'HabitacionesController@store'
    ]);

    Route::get('/{id}/show',[
        'as' => 'habitaciones.show',
        'uses' => 'HabitacionesController@show'
    ]);

    Route::get('/{id}/update',[
        'as' => 'habitaciones.update',
        'uses' => 'HabitacionesController@update'
    ]);


    Route::put('/{id}/edit',[
        'as' => 'habitaciones.edit',
        'uses' => 'HabitacionesController@edit'
    ]);

    Route::put('/{id}/edit2',[
        'as' => 'habitaciones.edit2',
        'uses' => 'HabitacionesController@edit2'
    ]);
    
});