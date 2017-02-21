<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clientes;
use App\Inventario;
use App\Productos;
use App\Ventas;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class VentaController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->venta = Ventas::find($route->getParameter('ventas'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::All();
        $inventario = Inventario::All();
        $ventas = Ventas::All();
        return view('back.ventas.index', compact('ventas','clientes','inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = array('' => "Seleccione") + \DB::table('clientes')->select(\DB::raw('CONCAT(nombre, " ", apellido, " ") as nombre, id as id'))->orderBy('nombre', 'asc')->lists('nombre','id');

        $productosInventario = Inventario::distinct()->select('producto')->get();
        $arrayProductos = [];
        foreach ($productosInventario as $idDistintos) {
            $nombreProductos = Productos::find($idDistintos->producto);
            $arrayProductos[$idDistintos->producto] = $nombreProductos->nombre;
        }
        $productos = array('' => "Seleccione") + $arrayProductos;
        return view('back.ventas.new', compact('clientes', 'productos'));
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
            if($request['apartar'] != 1)
            {
                $request['apartar'] = 0;
            }
            $campos = [
                'cantidad'  => $request['cantidad'], 
                'producto'  => $request['producto'],
                'cliente'   => $request['cliente'], 
                'apartar'   => $request['apartar']
            ];
            Ventas::create($campos);
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
        return view('back.ventas.show', ['venta' => $this->venta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = array('' => "Seleccione") + \DB::table('clientes')->select(\DB::raw('CONCAT(nombre, " ", apellido, " ") as nombre, id as id'))->orderBy('nombre', 'asc')->lists('nombre','id');

        $productosInventario = Inventario::distinct()->select('producto')->get();
        $arrayProductos = [];
        foreach ($productosInventario as $idDistintos) {
            $nombreProductos = Productos::find($idDistintos->producto);
            $arrayProductos[$idDistintos->producto] = $nombreProductos->nombre;
        }
        $productos = array('' => "Seleccione") + $arrayProductos;
        return view('back.ventas.edit', ['venta' => $this->venta, 'clientes' => $clientes, 'productos' => $productos]);
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
            if($request['apartar'] != 1)
            {
                $request['apartar'] = 0;
            }
            $campos = [
                'cantidad'  => $request['cantidad'], 
                'producto'  => $request['producto'],
                'cliente'   => $request['cliente'], 
                'apartar'   => $request['apartar']
            ];
            $this->venta->fill($campos);
            $this->venta->save();
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
        if (is_null ($this->venta))
            \App::abort(404);

        $this->venta->delete();

        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Venta "' . $this->venta->id . '" eliminada satisfactoriamente',
                'id'      => $this->venta->id
            ));
        }
        else
        {
            $mensaje = 'Venta "'.$this->venta->id.'" eliminada satisfactoriamente';
            Session::flash('message-alert', $mensaje);
            return Redirect::route('dashboard.ventas.index');
        }
    }
}
