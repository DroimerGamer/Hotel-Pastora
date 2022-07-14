<?php
/*
 * Created by VSCODE.
 * User: Jesus R.
 * Date: 22/07/2022
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller{

    private $user;

    public function __construct(UserRepository $userrrr){
        $this->user = $userrrr;
    }

    public function index(Request $request)
    {
        $search = "";
            $limit =5;
            if($request->has('search')){
                $search = $request->input('search');
                if(trim($search) != ''){
                    $data = $this->user->search($search);
                }else{
                    $data = $this->user->all();
                }
            }else{
                $data = $this->user->all();
            }
            $currentPage = Paginator::resolveCurrentPage() -1;
            $perPage = $limit;
            $currentPageSearchResults = $data->slice($currentPage * $perPage, $perPage)->all();
            $data = new LengthAwarePaginator($currentPageSearchResults, count($data), $perPage);
            return view('admin.Usuarios.index', ['data' => $data, 'search' => $search, 'page' => $currentPage]);
    }

    public function create(){
        return view('admin.Usuarios.create');
    }

    protected function store(Request $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ])->assignRole($data['roles']);

        return redirect()->route('Usuarios.index');
    }
     
    public function delete($id){
        $data = $this->user->show($id);
        return view('admin.Usuarios.delete',['data'=>$data]);
    }

    public function destroy(Request $request){
        $id = $request['id'];
        $result = $this->user->destroy($id);
        if($result == 1){
            Session::flash('status', 'El empleado fue eliminado');
            Session::flash('status_type', 'success');
            return redirect()->route('Usuarios.index');
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
