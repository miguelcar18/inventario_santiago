<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inventario;
use App\Productos;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class InventarioController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->inventario = Inventario::find($route->getParameter('inventario'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventario = Inventario::All();
        return view('back.inventario.index', compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = array('' => "Seleccione") + \DB::table('productos')->orderBy('nombre', 'asc')->lists('nombre','id');
        return view('back.inventario.new', compact('productos'));
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
                'cantidad'  => $request['cantidad'], 
                'producto'  => $request['producto']
            ];
            Inventario::create($campos);
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
        return view('back.inventario.show', ['inventario' => $this->inventario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = array('' => "Seleccione") + \DB::table('productos')->orderBy('nombre', 'asc')->lists('nombre','id');
        return view('back.inventario.edit', ['inventario' => $this->inventario, 'productos' => $productos]);
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
                'cantidad'  => $request['cantidad'], 
                'producto'  => $request['producto']
            ];
            $this->inventario->fill($campos);
            $this->inventario->save();
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
        if (is_null ($this->inventario))
            \App::abort(404);

        $this->inventario->delete();

        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Registro "' . $this->inventario->id . '" eliminado satisfactoriamente',
                'id'      => $this->inventario->id
            ));
        }
        else
        {
            $mensaje = 'Registro "'.$this->inventario->id.'" eliminado satisfactoriamente';
            Session::flash('message-alert', $mensaje);
            return Redirect::route('dashboard.inventario.index');
        }
    }

    public function totalProductoSeleccionado(Request $request, $id) 
    {
        if($request->ajax()){
            $productoInventario = Inventario::where('producto', $id)->get();
            $total = 0;
            foreach ($productoInventario as $data) {
                $total = $total + $data->cantidad;
            }
            return Response::json(array(
                'correcto'  =>  true,
                'total'     =>  $total
            ));
        }
    }
}
