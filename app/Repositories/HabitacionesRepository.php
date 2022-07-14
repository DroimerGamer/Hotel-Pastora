<?php
namespace App\Repositories;
use App\Models\Habitaciones;
use DB;

class HabitacionesRepository{
    public function all(){
        return Habitaciones::all();
    }

    public function habitaciones(){
        return DB::table('tipo_habitacion')->get();
    }

    public function tipo1(){
        return Habitaciones::where([['tipo','=','Tipo 1'],['estado','=','Activa']])->get();
    }

    public function tipo1P(){
        return Habitaciones::where([['tipo','=','Tipo 1 - Premium'],['estado','=','Activa']])->get();
    }

    public function tipo2(){
        return Habitaciones::where([['tipo','=','Tipo 2'],['estado','=','Activa']])->get();
    }

    public function tipo3(){
        return Habitaciones::where([['tipo','=','Tipo 3'],['estado','=','Activa']])->get();
    }

    public function tipoP(){
        return Habitaciones::where([['tipo','=','Tipo Premium'],['estado','=','Activa']])->get();
    }

    public function search($value){
        return Habitaciones::where([['tipo','like', "%$value%"]])
        ->orWhere([['numero','like', "%$value%"]])
        ->orderby('numero')->get();
    }

    public function store($data){
        try{
            DB::beginTransaction();
            $dataHabitacion = [
                'numero' => $data['numero'],
                'tipo' => $data['tipo'],
                'estado' => $data['estado']
            ];
            $habitacion = new Habitaciones($dataHabitacion);
            $habitacion->save();
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
        return Habitaciones::findOrFail($id);
    }

    public function update($data, $id){
        try{
            DB::beginTransaction();
           $habitacion = Habitaciones::findOrFail($id);
           $habitacion->update($data);
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
            $habitacion = Habitaciones::findOrFail($id);
            $habitacion->delete();
    
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
}