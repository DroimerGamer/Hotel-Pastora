<?php
/*
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EmpleadosRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class EmpleadosController extends Controller
{
    
        private $empleados;
    
        public function __construct(EmpleadosRepository $empleadosRepository){
            $this->empleados = $empleadosRepository;
        }
        public function index(Request $request){
            $search = "";
            $limit =5;
            if($request->has('search')){
                $search = $request->input('search');
                if(trim($search) != ''){
                    $data = $this->empleados->search($search);
                }else{
                    $data = $this->empleados->empleados();
                }
            }else{
                $data = $this->empleados->empleados();
            }
            $currentPage = Paginator::resolveCurrentPage() -1;
            $perPage = $limit;
            $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
            $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
            return view('admin.Empleados.index', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
        }
        public function error(){
            return view('admin.alerts.error');
        }
    
        public function create(){
            return view('admin.Empleados.create'); 
        }
    
        public function persona(Request $request){
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
                                $dataEmpleados = [
                                    'rfc' => ($request['rfc']),
                                    'nss' => ($request['nss']),
                                    'nivel_de_estudio' => $request['nivel_de_estudio'],
                                    'curp' => $request['curp'],
                                ];
                                $dataEmpleo = [
                                    'puesto' => ucfirst($request['puesto']),
                                    'horario_entrada' =>($request['horario_entrada']),
                                    'horario_salida' => $request['horario_salida'],
                                ];
                                
                                $result = $this->empleados->persona($dataDomicilio, $dataPersona, $dataEmpleo, $dataEmpleados);
                                
                                if($result == 1){
                                    Session::flash('status', 'Los datos han sido guardados');
                                    Session::flash('status_type', 'success');
                                    return redirect()->route('Empleados.index');
                                }
                                if($result == 2){
                                    Session::flash('status', 'Problema del proceso');
                                    Session::flash('status_type', 'danger');
                                    return redirect()->route('admin.alerts.error');
                                }
                                if($result == 3){
                                    Session::flash('status', 'Problema del query');
                                    Session::flash('status_type', 'danger');
                                    return redirect()->route('admin.alerts.error');
                                }
                
        }
    
            public function show($id){
                $data = $this->empleados->show($id);
                return view('admin.empleados.show',['data'=>$data]);
            }
        
            public function update($id){
                $data = $this->empleados->show($id);
                return view('admin.empleados.update',['data'=>$data]);
            }

            public function delete($id){
                $data = $this->empleados->show2($id);
                return view('admin.empleados.delete',['data'=>$data]);
            }
    
            public function destroy(Request $request){
                $id = $request['id_empleado'];
                $result = $this->empleados->destroy($id);
                if($result == 1){
                    Session::flash('status', 'El empleado fue eliminado');
                    Session::flash('status_type', 'success');
                    return redirect()->route('Empleados.index');
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

              public function update_persona($id){
                $data = $this->empleados->show_persona($id);
                return view('admin.Empleados.updatePersona',['data'=>$data]);
            }
        
            public function edit_persona(Request $request, $id){
                $dataPersona = [
                    'nombre' => ucfirst($request['nombre']),
                    'apellido_paterno' => ucfirst($request['apellido_paterno']),
                    'apellido_materno' => ucfirst($request['apellido_materno']),
                    'edad' => $request['edad'],
                    'telefono' => $request['telefono']
                ];
        
                $result = $this->empleados->update_persona($dataPersona, $id);
                
                if($result == 1){
                    Session::flash('status', 'Los datos han sido guardados');
                    Session::flash('status_type', 'success');
                    return redirect()->route('Empleados.index');
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
                $data = $this->empleados->show_domicilio($id);
                return view('admin.Empleados.updateDomicilio',['data'=>$data]);
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
        
                $result = $this->empleados->update_domicilio($data, $id);
                
                if($result == 1){
                    Session::flash('status', 'Los datos han sido guardados');
                    Session::flash('status_type', 'success');
                    return redirect()->route('Empleados.index');
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

            public function update_empleo($id){
                $data = $this->empleados->show_empleo($id);
                return view('admin.Empleados.updateEmpleo',['data'=>$data]);
            }
        
            public function edit_empleo(Request $request, $id){
                $data = [
                    'puesto' => $request['puesto'],
                    'horario_entrada' =>$request['horario_entrada'],
                    'horario_salida' => $request['horario_salida']
                ];
        
                $result = $this->empleados->update_empleo($data, $id);
                
                if($result == 1){
                    Session::flash('status', 'Los datos han sido guardados');
                    Session::flash('status_type', 'success');
                    return redirect()->route('Empleados.index');
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

            

            public function update_empleados($id){
                $data = $this->empleados->show_empleados($id);
                return view('admin.Empleados.updateEmpleados',['data'=>$data]);
            }
        
            public function edit_empleados(Request $request, $id){
                $data = [
                    'rfc' => $request['rfc'],
                    'nss' => $request['nss'],
                    'nivel_de_estudio' => $request['nivel_de_estudio'],
                    'curp' => $request['curp']
                ];
        
                $result = $this->empleados->update_empleados($data, $id);
                
                if($result == 1){
                    Session::flash('status', 'Los datos han sido guardados');
                    Session::flash('status_type', 'success');
                    return redirect()->route('Empleados.index');
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
