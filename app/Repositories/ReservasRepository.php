<?php
namespace App\Repositories;
use App\Models\Reservas;
use App\Models\Persona;
use App\Models\Domicilio;
use App\Models\Cliente;
use DB;
date_default_timezone_set('America/Mexico_City');

class ReservasRepository{

    public function all(){
        return Reservas::all();
    }

    public function reserva(){
        return DB::table('reserva')->where('fecha_entrada','=', date("y-m-d"))
        ->orWhere('fecha_salida','=', date("y-m-d"))
        ->orWhere([['fecha_entrada','<', date("y-m-d")],['fecha_salida','>', date("y-m-d")]])
        ->orderby('fecha_entrada', 'DESC')->get();
    }

    public function reserva_all(){
        $dia = date("d")-7;
        return DB::table('reserva')->where('fecha_entrada','>', date("y-m-")."$dia")
        ->orderby('id_reservacion', 'DESC')->get();
    }

   

    public function search2($value){
        return DB::table('reserva')->where('fecha_entrada','=', $value)
        ->orWhere('fecha_salida','=', $value)
        ->orWhere([['fecha_entrada','<', $value],['fecha_salida','>', $value]])
        ->orWhere('nombre','like', "%$value%")
        ->orderby('fecha_entrada')->get();
    }


    public function maxdom(){
        $data = DB::table('maxdom')->get();
        foreach ($data as $id){
            return $id->id_domicilio;
        }
    }

    public function maxpersona(){
        $data = DB::table('maxpersona')->get();
        foreach ($data as $id){
            return $id->id_persona;
        }
    }

    public function maxcliente(){
        $data = DB::table('maxcliente')->get();
        foreach ($data as $id){
            return $id->id_cliente;
        }
    }

    public function validacion($fecha_entrada, $fecha_salida){
        if($fecha_entrada > $fecha_salida){
            return true;
        }else{
            return false;
        }
    }

    public function store($dataDom, $dataPer, $dataCli, $dataRes){
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
            
            $id_persona = $this->maxpersona();

            $dataCliente = [
                'id_persona' => $id_persona,
                'correo_electronico' => $dataCli['correo_electronico'],
                'empresa' => $dataCli['empresa'],
                'automovil' => $dataCli['automovil']
            ];

            $cliente = new Cliente($dataCliente);
            $cliente->save();

            $id_cliente = $this->maxcliente();

            $dataReserva = [
                'id_cliente' => $id_cliente,
                'fecha_entrada' => $dataRes['fecha_entrada'],
                'fecha_salida' => $dataRes['fecha_salida'],
                'hora_entrada' => $dataRes['hora_entrada'],
                'hora_salida' => $dataRes['hora_salida'],
                'cant_personas' => $dataRes['cant_personas'],
                'estado' => $dataRes['estado'],
                'id_habitacion' => $dataRes['id_habitacion'],
                'created_by' => $dataRes['created_by'],
            ];

            $reservas = new Reservas($dataReserva);
            $reservas->save();

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
        return DB::table('reserva')->where('id_reservacion','=', $id)->get();
    }

    public function show_persona($id){
        return Persona::findOrFail($id);
    }

    public function update_persona($data, $id, $last){
        try{
            DB::beginTransaction();
            DB::table('reserva')->where('id_persona','=', $id)->update(array('last_modification_by' => $last));
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

    public function update_domicilio($data, $id, $last){
        try{
            DB::beginTransaction();
            DB::table('reserva')->where('id_domicilio','=', $id)->update(array('last_modification_by' => $last));
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

    public function show_cliente($id){
        return Cliente::findOrFail($id);
    }

    public function update_cliente($data, $id, $last){
        try{
            DB::beginTransaction();
            Reservas::where('id_cliente', $id)->update(array('last_modification_by' => $last));
           $cliente = Cliente::findOrFail($id);
           $cliente->update($data);
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

    public function show_reserva($id){
        return Reservas::findOrFail($id);
    }

    public function update_reserva($data, $id){
        try{
            DB::beginTransaction();
           $reserva = Reservas::findOrFail($id);
           $reserva->update($data);
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

    public function destroy($id_reserva, $id_cliente, $id_persona, $id_domicilio){
        try{
            DB::beginTransaction();
            $reserva = Reservas::findOrFail($id_reserva);
            $reserva->delete();

            $cliente = Cliente::findOrFail($id_cliente);
            $cliente->delete();

            $persona = Persona::findOrFail($id_persona);
            $persona->delete();

            $domicilio = Domicilio::findOrFail($id_domicilio);
            $domicilio->delete();
    
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