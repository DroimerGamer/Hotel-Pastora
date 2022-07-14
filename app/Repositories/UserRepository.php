<?php
/*
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
*/
namespace App\Repositories;
use App\User;
use DB;

class UserRepository{
    
    public function all(){
        return User::where('name','!=','Desarrollador')->get();
    }
    
    
    public function search($value){
        return DB::table('users')->where([['name','like', "%$value%"]])
        ->orWhere([['name','like', "%$value%"]])
        ->orderby('name')->get();
    }

    public function show($id){
        return User::findOrFail($id);
    }
    public function destroy($id){
        try{
            DB::beginTransaction();
            $usuarios = User::findOrFail($id);
            $usuarios->delete();
    
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