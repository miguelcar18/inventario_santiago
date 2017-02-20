<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clientes;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class ClienteController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->cliente = Clientes::find($route->getParameter('clientes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::All();
        return view('back.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.clientes.new');
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
            $campos = [
                'nombre'    => $request['nombre'], 
                'apellido'  => $request['apellido'], 
                'cedula'    => $request['cedula'],
                'telefono'  => $request['telefono'],
                'correo'    => $request['correo']
            ];
            Clientes::create($campos);
            return response()->json([
                'nuevoContenido' => $request->all()
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
        return view('back.clientes.show', ['cliente' => $this->cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('back.clientes.edit', ['cliente' => $this->cliente]);
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
        if($request->ajax())
        {
            $campos = [
                'nombre'    => $request['nombre'], 
                'apellido'  => $request['apellido'], 
                'cedula'    => $request['cedula'],
                'telefono'  => $request['telefono'],
                'correo'    => $request['correo']
            ];
            $this->cliente->fill($campos);
            $this->cliente->save();
            return response()->json([
                'nuevoContenido' => $campos           
            ]);
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
        if (is_null ($this->cliente))
            \App::abort(404);
        $this->cliente->delete();
        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Cliente "' . $this->cliente->nombre . ' '. $this->cliente->apellido .'" eliminado satisfactoriamente',
                'id'      => $this->cliente->id
            ));
        }
        else
        {
            $mensaje = 'Cliente "'.$this->cliente->nombre.'"  '. $this->cliente->apellido .'" eliminado satisfactoriamente';
            Session::flash('message-alert', $mensaje);
            return Redirect::route('dashboard.clientes.index');
        }
    }
}
