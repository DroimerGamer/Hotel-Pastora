<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReservasRepository;
use App\Repositories\HabitacionesRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ReservasController extends Controller
{

    private $reservas;
    private $habitacion;

    public function __construct(ReservasRepository $reservasRepository, HabitacionesRepository $habita){
        $this->reservas = $reservasRepository;
        $this->habitacion = $habita;
    }

    public function index(Request $request){
        $search = "";
        $limit =5;
        if($request->has('search')){
            $search = $request->input('search');
            if(trim($search) != ''){
                $data = $this->reservas->search($search);
            }else{
                $data = $this->reservas->reserva();
            }
        }else{
            $data = $this->reservas->reserva();
        }
        $currentPage = Paginator::resolveCurrentPage() -1;
        $perPage = $limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
        return view('admin.reservas.index', ['data' => $data,'search' => $search, 'page' => $currentPage]);
    }

    public function index2(Request $request){
        $search = "";
        $limit =10;
        if($request->has('search')){
            $search = $request->input('search');
            if(trim($search) != ''){
                $data = $this->reservas->search2($search);
            }else{
                $data = $this->reservas->reserva_all();
            }
        }else{
            $data = $this->reservas->reserva_all();
        }
        $currentPage = Paginator::resolveCurrentPage() -1;
        $perPage = $limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
        return view('admin.reservas.index2', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }

    public function create(){
        $data = $this->habitacion->habitaciones();
        return view('admin.reservas.create',['data'=>$data]);
    }

    public function store(Request $request){
                            $dataDomicilio = [
                                'ciudad' => $request['ciudad'],
                                'estado' => $request['estado'],
                                'cp' => $request['cp'],
                                'colonia' => $request['colonia'],
                                'calle' => $request['calle'],
                                'numero' => $request['numero'],
                            ];

                            $dataPersona = [
                                'nombre' => ucfirst($request['nombre']),
                                'apellido_paterno' => ucfirst($request['apellido_paterno']),
                                'apellido_materno' => ucfirst($request['apellido_materno']),
                                'edad' => $request['edad'],
                                'telefono' => $request['telefono'],
                            ];
                            $dataCliente = [
                                'correo_electronico' => $request['correo_electronico'],
                                'empresa' => $request['empresa'],
                                'automovil' => $request['automovil']
                            ];
                            $dataReserva = [
                                'fecha_entrada' => $request['fecha_entrada'],
                                'fecha_salida' => $request['fecha_salida'],
                                'hora_entrada' => $request['hora_entrada'],
                                'hora_salida' => $request['hora_salida'],
                                'cant_personas' => $request['cant_personas'],
                                'estado' => $request['estado_reserva'],
                                'id_habitacion' => $request['id_habitacion'],
                                'created_by' => $request['created_by'],
                            ];

                            if($this->reservas->validacion($request['fecha_entrada'],$request['fecha_salida'])){
                                return view('admin.alerts.validacion');
                            }else{

                            $result = $this->reservas->store($dataDomicilio, $dataPersona, $dataCliente, $dataReserva);
                            
                            if($result == 1){
                                Session::flash('status', 'Los datos han sido guardados');
                                Session::flash('status_type', 'success');
                                return redirect()->route('reservas.index2');
                            }
                            if($result == 2){
                                Session::flash('status', 'Problema del proceso');
                                Session::flash('status_type', 'danger');
                                return view('admin.alerts.error');
                            }
                            if($result == 3){
                                Session::flash('status', 'Problema del query');
                                Session::flash('status_type', 'danger');
                                return view('admin.alerts.error');
                            }
                                
                        }
            
    }

    public function show($id){
        $data = $this->reservas->show($id);
        return view('admin.reservas.show',['data'=>$data]);
    }

    public function update_persona($id){
        $data = $this->reservas->show_persona($id);
        return view('admin.reservas.updatePersona',['data'=>$data]);
    }

    public function edit_persona(Request $request, $id){
        $dataPersona = [
            'nombre' => ucfirst($request['nombre']),
            'apellido_paterno' => ucfirst($request['apellido_paterno']),
            'apellido_materno' => ucfirst($request['apellido_materno']),
            'edad' => $request['edad'],
            'telefono' => $request['telefono']
        ];
        $result = $this->reservas->update_persona($dataPersona, $id, $request['last_modification_by']);
        
        if($result == 1){
            Session::flash('status', 'Los datos han sido guardados');
            Session::flash('status_type', 'success');
            return redirect()->route('reservas.index');
        }
        if($result == 2){
            Session::flash('status', 'Problema del proceso');
            Session::flash('status_type', 'danger');
            return view('admin.alerts.error');
        }
        if($result == 3){
            Session::flash('status', 'Problema del query');
            Session::flash('status_type', 'danger');
            return view('admin.alerts.error');
        }
    }

    public function update_domicilio($id){
        $data = $this->reservas->show_domicilio($id);
        return view('admin.reservas.updateDomicilio',['data'=>$data]);
    }

    public function edit_domicilio(Request $request, $id){
        $data = [
            'ciudad' => $request['ciudad'],
            'estado' => $request['estado'],
            'cp' => $request['cp'],
            'colonia' => $request['colonia'],
            'calle' => $request['calle'],
            'numero' => $request['numero']
        ];

        $result = $this->reservas->update_domicilio($data, $id, $request['last_modification_by']);
        
        if($result == 1){
            Session::flash('status', 'Los datos han sido guardados');
            Session::flash('status_type', 'success');
            return redirect()->route('reservas.index');
        }
        if($result == 2){
            Session::flash('status', 'Problema del proceso');
            Session::flash('status_type', 'danger');
            return view('admin.alerts.error');
        }
        if($result == 3){
            Session::flash('status', 'Problema del query');
            Session::flash('status_type', 'danger');
            return view('admin.alerts.error');
        }
    }

    public function update_cliente($id){
        $data = $this->reservas->show_cliente($id);
        return view('admin.reservas.updateCliente',['data'=>$data]);
    }

    public function edit_cliente(Request $request, $id){
        $data = [
            'correo_electronico' => $request['correo_electronico'],
            'empresa' => $request['empresa'],
            'automovil' => $request['automovil']
        ];

        $result = $this->reservas->update_cliente($data, $id, $request['last_modification_by']);
        
        if($result == 1){
            Session::flash('status', 'Los datos han sido guardados');
            Session::flash('status_type', 'success');
            return redirect()->route('reservas.index');
        }
        if($result == 2){
            Session::flash('status', 'Problema del proceso');
            Session::flash('status_type', 'danger');
            return view('admin.alerts.error');
        }
        if($result == 3){
            Session::flash('status', 'Problema del query');
            Session::flash('status_type', 'danger');
            return view('admin.alerts.error');
        }
    }

    public function update_reserva($id){
        $data = $this->reservas->show_reserva($id);
        return view('admin.reservas.updateReserva',['data'=>$data]);
    }

    public function edit_reserva(Request $request, $id){
        $data = [
            'fecha_entrada' => $request['fecha_entrada'],
            'fecha_salida' => $request['fecha_salida'],
            'hora_entrada' => $request['hora_entrada'],
            'hora_salida' => $request['hora_salida'],
            'cant_personas' => $request['cant_personas'],
            'estado' => $request['estado'],
            'last_modification_by' => $request['last_modification_by'],
        ];

        $result = $this->reservas->update_reserva($data, $id);
        
        if($result == 1){
            Session::flash('status', 'Los datos han sido guardados');
            Session::flash('status_type', 'success');
            return redirect()->route('reservas.index');
        }
        if($result == 2){
            Session::flash('status', 'Problema del proceso');
            Session::flash('status_type', 'danger');
            return view('admin.alerts.error');
        }
        if($result == 3){
            Session::flash('status', 'Problema del query');
            Session::flash('status_type', 'danger');
            return view('admin.alerts.error');
        }
    }

    public function delete($id){
        $data = $this->reservas->show($id);
        return view('admin.reservas.delete',['data'=>$data]);
    }

    public function destroy(Request $request){
        $id_reservacion = $request['id_reservacion'];
        $id_cliente = $request['id_cliente'];
        $id_persona = $request['id_persona'];
        $id_domicilio = $request['id_domicilio'];
        $result = $this->reservas->destroy($id_reservacion, $id_cliente, $id_persona, $id_domicilio);
        if($result == 1){
            Session::flash('status', 'El empleado fue eliminado');
            Session::flash('status_type', 'success');
            return redirect()->route('reservas.index');
        }
        if($result == 2){
            Session::flash('status', 'Problema del proceso');
            Session::flash('status_type', 'danger');
            return back()->withInput();
        }
        if($result == 3){
            Session::flash('status', 'Problema del query');
            Session::flash('status_type', 'danger');
            return back()->withInput();
        }  
        
      }

}
