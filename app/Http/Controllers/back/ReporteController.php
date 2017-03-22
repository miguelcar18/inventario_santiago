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

class ReporteController extends Controller
{
    public function __construct(){
        //middleware para autorizar acciones
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consulta()
    {
        $clientes = array('' => "Seleccione") + \DB::table('clientes')->select(\DB::raw('CONCAT(nombre, " ", apellido, " ") as nombre, id as id'))->orderBy('nombre', 'asc')->lists('nombre','id');
        $productosInventario = Inventario::distinct()->select('producto')->get();
        $arrayProductos = [];
        foreach ($productosInventario as $idDistintos) {
            $nombreProductos = Productos::find($idDistintos->producto);
            $arrayProductos[$idDistintos->producto] = $nombreProductos->nombre;
        }
        $productos = array('' => "Seleccione") + $arrayProductos;
        return view('back.reportes.consulta', compact('clientes', 'productos'));
    }

    public function buscar(Request $request)
    {
        $cliente    = $request['cliente'];
        $producto   = $request['producto'];
        $desdes     = explode('-', $request['desde']);
        $hastas     = explode('-', $request['hasta']);
        $desde      = $desdes[2].'-'.$desdes[1].'-'.$desdes[0];
        $hasta      = $hastas[2].'-'.$hastas[1].'-'.$hastas[0];

        $resultados = Ventas::where('id', '>', '0');

        if($cliente != "")
        {
            $resultados = $resultados->where('cliente', $cliente);
        }

        if($producto != "")
        {
            $resultados = $resultados->where('producto', $producto);
        }

        if($request['desde'] != "" && $request['hasta'] == "")
        {
            $resultados = $resultados->where('updated_at', $desde);
        }

        if($request['desde'] == "" && $request['hasta'] != "")
        {
            $resultados = $resultados->where('updated_at', $hasta);
        }

        if($request['desde'] != "" && $request['hasta'] != "")
        {
            $resultados = $resultados->whereBetween('updated_at', [$desde, $hasta]);
        }
        $resultados = $resultados->get();

        return view('back.reportes.resultados', compact('resultados'));

    }
}
