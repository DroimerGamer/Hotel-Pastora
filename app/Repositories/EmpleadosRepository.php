<?php
/*
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
*/
namespace App\Repositories;
use App\Models\Empleados;
use App\Models\Domicilio;
use App\Models\Persona;
use App\Models\Empleo;
use DB;

class EmpleadosRepository{
    public function all(){
        return Empleados::all();
    }

    public function empleados(){
        return DB::table('empleado_all')->get();
    }

    public function maxpersona(){
        $data = DB::table('maxpersona')->get();
        foreach ($data as $id){
            return $id->id_persona;
        }
    }

    public function maxdom(){
        $data = DB::table('maxdom')->get();
        foreach ($data as $id){
            return $id->id_domicilio;
        }
    }

    public function maxempleo(){
        $data = DB::table('maxempleo')->get();
        foreach ($data as $id){
            return $id->id_empleo;
        }
    }

    public function search($value){
        return DB::table('empleado_all')->where([['nombre','like', "%$value%"]])
        ->orWhere([['curp','like', "%$value%"]])
        ->orderby('nombre')->get();
    }

    public function persona($dataDom, $dataPer, $dataempl, $dataEmpleado){
        try{
            DB::beginTransaction();
            $dataDomicilio = [
                'ciudad' => $dataDom['ciudad'],
                'estado' => $dataDom['estado'],
                'cp' => $dataDom['cp'],
                'colonia' => $dataDom['colonia'],
                'calle' => $dataDom['calle'],
                'numero' => $dataDom['numero']
            ];
            $domicilio = new Domicilio($dataDomicilio);
            $domicilio->save();

            $id_domicilio = $this->maxdom();

            $dataPersona = [
                'nombre' => $dataPer['nombre'],
                'apellido_paterno' => $dataPer['apellido_paterno'],
                'apellido_materno' => $dataPer['apellido_materno'],
                'edad' => $dataPer['edad'],
                'telefono' => $dataPer['telefono'],
                'id_domicilio' => $id_domicilio
            ];

            $persona = new Persona($dataPersona);
            $persona->save();

            $dataEmpleo = [
                'puesto' => $dataempl['puesto'],
                'horario_entrada' => $dataempl['horario_entrada'],
                'horario_salida' => $dataempl['horario_salida']
            ];

            $empleo = new Empleo($dataEmpleo);
            $empleo->save();
            
            $id_empleo = $this->maxempleo();
            $id_persona = $this->maxpersona();

            $dataEmpleados = [
                'id_persona' => $id_persona,
                'id_empleo' => $id_empleo,
                'rfc' => $dataEmpleado['rfc'],
                'nss' => $dataEmpleado['nss'],
                'nivel_de_estudio' => $dataEmpleado['nivel_de_estudio'],
                'curp' => $dataEmpleado['curp']
            ];
            $empleados = new Empleados($dataEmpleados);
            $empleados->save();
            DB::commit();
            return 1;
        }catch (\Exception $e){
            DB::rollBack();
            return 2;
        }catch (QueryException $ex){
            DB::rollBack();
            return 3;
        }
        
    }

    public function show($id){
        return DB::table('empleado_all')->where('id_empleado','=',$id)->get();
    }
    public function show2($id){
        return Empleados::findOrFail($id);
    }

    public function update($data, $id){
        try{
            DB::beginTransaction();
           $empleados = Empleados::findOrFail($id);
           $empleados->update($data);
            DB::commit();
            return 1;
        }catch (\Exception $e){
            DB::rollBack();
            return 2;
        }catch (QueryException $ex){
            DB::rollBack();
            return 3;
        }
    }
    public function destroy($id){
        try{
            DB::beginTransaction();
            $empleados = Empleados::findOrFail($id);
            $empleados->delete();
    
            DB::commit();
            return 1;
        } catch (Exception $e){
            DB::rollBack();
            return 2;
        } catch (QueryException $ex){
            DB::rollBack();
            return 3;
        }
    }
    public function show_persona($id){
        return Persona::findOrFail($id);
    }

    public function update_persona($data, $id){
        try{
            DB::beginTransaction();
           $persona = Persona::findOrFail($id);
           $persona->update($data);
            DB::commit();
            return 1;
        }catch (\Exception $e){
            DB::rollBack();
            return 2;
        }catch (QueryException $ex){
            DB::rollBack();
            return 3;
        }
    }
    public function show_domicilio($id){
        return Domicilio::findOrFail($id);
    }

    public function update_domicilio($data, $id){
        try{
            DB::beginTransaction();
           $domicilio = Domicilio::findOrFail($id);
           $domicilio->update($data);
            DB::commit();
            return 1;
        }catch (\Exception $e){
            DB::rollBack();
            return 2;
        }catch (QueryException $ex){
            DB::rollBack();
            return 3;
        }
    }
    public function show_empleo($id){
        return Empleo::findOrFail($id);
    }

    public function update_empleo($data, $id){
        try{
            DB::beginTransaction();
           $empleo = Empleo::findOrFail($id);
           $empleo->update($data);
            DB::commit();
            return 1;
        }catch (\Exception $e){
            DB::rollBack();
            return 2;
        }catch (QueryException $ex){
            DB::rollBack();
            return 3;
        }
    }

    public function show_empleados($id){
        return Empleados::findOrFail($id);
    }

    public function update_empleados($data, $id){
        try{
            DB::beginTransaction();
           $empleo = Empleados::findOrFail($id);
           $empleo->update($data);
            DB::commit();
            return 1;
        }catch (\Exception $e){
            DB::rollBack();
            return 2;
        }catch (QueryException $ex){
            DB::rollBack();
            return 3;
        }
    }
}