<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Productos;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class ProductoController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
        $this->beforeFilter('@find');
    }

    public function find(Route $route){
        $this->producto = Productos::find($route->getParameter('productos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::All();
        return view('back.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.productos.new');
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
                $file = $request->file('file');
                $nombre = Carbon::now()->toDateTimeString().$file->getClientOriginalName();
                \Storage::disk('productos')->put($nombre,  \File::get($file));
            }
            else
            {
                $nombre = '';
            }
            $campos = [
                'nombre'        => $request['nombre'], 
                'precioCosto'   => $request['precioCosto'], 
                'precioVenta'   => $request['precioVenta'],
                'path'          => $nombre
            ];
            Productos::create($campos);
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
        return view('back.productos.show', ['producto' => $this->producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('back.productos.edit', ['producto' => $this->producto]);
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
            if(!empty($request->file('file')) and $request->file('file') != '')
            {
                \File::delete('uploads/productos/'.$this->producto->path);
                $file = $request->file('file');
                $nombre = Carbon::now()->toDateTimeString().$file->getClientOriginalName();
                \Storage::disk('productos')->put($nombre,  \File::get($file));
            }   
            else
            {
                $nombre = $this->producto->path;
            }

            $campos = [
                'nombre'        => $request['nombre'], 
                'precioCosto'   => $request['precioCosto'], 
                'precioVenta'   => $request['precioVenta'],
                'path'          => $nombre
            ];
            $this->producto->fill($campos);
            $this->producto->save();
            return response()->json([
                'nuevoContenido' => $this->producto         
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
        if (is_null ($this->producto))
            \App::abort(404);
        $this->producto->delete();
        \File::delete('uploads/productos/'.$this->producto->path);
        if (\Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Producto "' . $this->producto->nombre .'" eliminado satisfactoriamente',
                'id'      => $this->producto->id
            ));
        }
        else
        {
            $mensaje = 'Producto "'.$this->producto->nombre .'" eliminado satisfactoriamente';
            Session::flash('message-alert', $mensaje);
            return Redirect::route('dashboard.productos.index');
        }
    }

    public function cambiarImagenEditar(Request $request, $id)
    {
        if($request->ajax()){
            $producto = Productos::find($id);
            return Response::json(array(
                'correcto'  =>  true,
                'producto'  =>  $producto
            ));
        }
    }
}
