<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\back\LoginRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;
use Session;
use Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.usuarios.login');
    }

    public function store(LoginRequest $request)
    {
        if($request->ajax())
        {
            if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']] ))
            {
                return Redirect::route('dashboard');
            }
            else
            {
                return response()->json([
                    'message' => 'error'
                ]);
            }
        }
    }

    public function changePassword()
    {
        $usuarios = array('' => "Seleccione") + \DB::table('usuarios')->orderBy('name', 'asc')->lists('name','id');
        return view('back.usuarios.olvidarContrasena', compact('usuarios'));
    }

    public function postChangePassword(Request $request)
    {
        if($request->ajax())
        {
        	$user = User::find($request['usuario']);
            if($user->respuesta == $request['respuesta'])
            {
                return response()->json([
                    'message' => 'correcto'
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'error'
                ]);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('login.index');
    }

    public function preguntaUsuarioSeleccionado(Request $request, $id) 
    {
        if($request->ajax()){
            $usuarioSeleccionado = User::find($id);
            return Response::json(array(
                'correcto'      =>  true,
                'valorPregunta' =>  $usuarioSeleccionado->pregunta
            ));
        }
    }

    public function nuevoPassword($id)
    {
    	$usuario = User::find($id);
        return view('back.usuarios.nuevaContrasena', compact('usuario'));
    }

    public function postNewPassword(Request $request)
    {
        if($request->ajax())
        {
        	$user = User::find($request['idUsuario']);
            $campos = [
                'password'  => bcrypt($request['password']) 
            ];
            $user->fill($campos);
            $user->save();

            return response()->json([
                'message' => 'correcto'
            ]);
        }
    }
}
