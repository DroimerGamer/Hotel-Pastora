<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HabitacionesRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class HabitacionesController extends Controller
{
    private $habitacion;

    public function __construct(HabitacionesRepository $habitacionesRepository){
        $this->habitacion = $habitacionesRepository;
    }

    public function index(Request $request){
        $search = "";
        $limit =10;
        if($request->has('search')){
            $search = $request->input('search');
            if(trim($search) != ''){
                $data = $this->habitacion->search($search);
            }else{
                $data = $this->habitacion->all();
            }
        }else{
            $data = $this->habitacion->all();
        }
        $currentPage = Paginator::resolveCurrentPage() -1;
        $perPage = $limit;
        $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
        $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
        return view('admin.habitaciones.index', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }

    public function index2(){
        $tipo1 = $this->habitacion->tipo1();
        $tipo1P = $this->habitacion->tipo1P();
        $tipo2 = $this->habitacion->tipo2();
        $tipo3 = $this->habitacion->tipo3();
        $tipoP = $this->habitacion->tipoP();
        return view('admin.habitaciones.index2', ['tipo1' => $tipo1, 'tipo1P' => $tipo1P,'tipo2' => $tipo2,'tipo3' => $tipo3,'tipoP' => $tipoP]);
    }

    public function create(){
        return view('admin.habitaciones.create');
    }

    public function store(Request $request){
                            $dataHabitacion = [
                                'numero' => $request['numero'],
                                'tipo' => $request['tipo'],
                                'estado' => $request['estado']
                            ];
                            $result = $this->habitacion->store($dataHabitacion);
                            
                            if($result == 1){
                                Session::flash('status', 'Los datos han sido guardados');
                                Session::flash('status_type', 'success');
                                return redirect()->route('habitaciones.index');
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

    public function show($id){
        $data = $this->habitacion->show($id);
        return view('admin.habitaciones.show',['data'=>$data]);
    }

    public function update($id){
        $data = $this->habitacion->show($id);
        return view('admin.habitaciones.update',['data'=>$data]);
    }

    public function edit(Request $request, $id){
        $dataHabitacion = [
            'numero' => $request['numero'],
            'tipo' => $request['tipo'],
            'estado' => $request['estado']
        ];
        $result = $this->habitacion->update($dataHabitacion, $id);
        
        if($result == 1){
            Session::flash('status', 'Los datos han sido guardados');
            Session::flash('status_type', 'success');
            return redirect()->route('habitaciones.index');
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

    public function edit2(Request $request, $id){
        $dataHabitacion = [
            'disponible' => $request['disponible']
        ];
        $result = $this->habitacion->update($dataHabitacion, $id);
        
        if($result == 1){
            Session::flash('status', 'Los datos han sido guardados');
            Session::flash('status_type', 'success');
            return redirect()->route('habitaciones.index2');
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
        $data = $this->habitacion->show($id);
        return view('admin.habitaciones.delete',['data'=>$data]);
    }

    public function destroy(Request $request){
        $id = $request['id_categoria'];
        $result = $this->habitacion->destroy($id);
        if($result == 1){
            Session::flash('status', 'La habitacion fue eliminada');
            Session::flash('status_type', 'success');
            return redirect()->route('habitaciones.index');
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