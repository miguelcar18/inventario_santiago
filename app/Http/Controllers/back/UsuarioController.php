<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\back\UserCreateRequest;
use App\Http\Requests\back\UserUpdateRequest;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Redirect;
use Response;
use Session;

class UsuarioController extends Controller
{

    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find', ['only' => ['show', 'edit', 'update', 'destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuarios'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', '9999')->get();
        return view('back.usuarios.index', compact('users'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.usuarios.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
        {
            if(!empty($request->file('file')))
            {
                //obtenemos el campo file definido en el formulario
                $file = $request->file('file');
                //obtenemos el nombre del archivo
                $nombre = Carbon::now()->toDateTimeString().$file->getClientOriginalName();
                //indicamos que queremos guardar un nuevo archivo en el disco local
                \Storage::disk('usuarios')->put($nombre,  \File::get($file));
            }
            else
            {
                $nombre = '';
            }
            //User::create($request->all());
            User::create([
                'username'  => $request['username'], 
                'name'      => $request['name'],
                'email'     => $request['email'], 
                'password'  => bcrypt($request['password']), 
                'path'      => $nombre, 
                'pregunta'  => $request['pregunta'], 
                'respuesta' => $request['respuesta']
            ]);
            
            return response()->json([
                'nuevoContenido'    => $request->all(),
                'message'           => 'correcto'
            ]);
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->id == $id)
        {
            return view('back.usuarios.profile', ['user' => $this->user, 'id' => $id]);
        }
        else
        {
            Session::flash('message-alert', 'Sin privilegios');
            Session::flash('titulo', 'Error');
            Session::flash('alerta', 'error');
            return Redirect::route('dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id)
        {
            return view('back.usuarios.edit', ['user' => $this->user]);    
        }
        else
        {
            Session::flash('message-alert', 'Sin privilegios');
            Session::flash('titulo', 'Error');
            Session::flash('alerta', 'error');
            return Redirect::route('dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->id == $id)
        {
            if($request->ajax())
            {
                if(!empty($request->file('file')) and $request->file('file') != '')
                {
                    \File::delete('uploads/usuarios/'.$this->user->path);

                    //obtenemos el campo file definido en el formulario
                    $file = $request->file('file');
                    //obtenemos el nombre del archivo
                    $nombre = Carbon::now()->toDateTimeString().$file->getClientOriginalName();
                    //indicamos que queremos guardar un nuevo archivo en el disco local
                    \Storage::disk('usuarios')->put($nombre,  \File::get($file));
                }   
                else
                {
                    $nombre = $this->user->path;
                }

                $this->user->fill([
                    'username'  => $request['username'], 
                    'name'      => $request['name'],
                    'email'     => $request['email'], 
                    'path'      => $nombre, 
                    'pregunta'  => $request['pregunta'], 
                    'respuesta' => $request['respuesta']
                    ]);
                $this->user->save();

                return Response::json([
                    'nuevoContenido' => $this->user
                ]);
            }
        }
        else
        {
            Session::flash('message-alert', 'Sin privilegios');
            Session::flash('titulo', 'Error');
            Session::flash('alerta', 'error');
            return Redirect::route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id != Auth::user()->id)
        {
            if (is_null ($this->user))
            {
                \App::abort(404);
            }

            $this->user->delete();
            \File::delete('uploads/usuarios/'.$this->user->path);

            if (\Request::ajax())
            {
                return Response::json(array (
                    'success' => true,
                    'msg'     => 'Usuario "' . $this->user->username . '" eliminado satisfactoriamente',
                    'id'      => $this->user->id,
                ));
            }
            else
            {
                Session::flash('message-alert', 'Usuario "' . $this->user->username . '" eliminado satisfactoriamente');
                return Redirect::route('dashboard.usuarios.index');
            }
        }
        else if($id == Auth::user()->id && \Request::ajax())
        {
            return Response::json(array (
                'error' => true,
                'msg'     => 'No puede eliminarse a usted mismo en este sistema'
            ));
        }    
    }

    public function cambiarImagenEditar(Request $request, $id)
    {
        if($request->ajax()){
            $usuario = User::find($id);
            return Response::json(array(
                'correcto'  =>  true,
                'usuario'   =>  $usuario
            ));
        }
    }
}
