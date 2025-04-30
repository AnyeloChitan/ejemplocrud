<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    //
    public function index(){

        //clientes
        $totalClientes=Cliente::count();
        //productos
        $totalProductos=Producto::count();
        $productosEnStock=Producto::where('stock','>',0)->count();
        //categorias
        $totalCategorias=Categoria::count();
        $activasCategorias=Categoria::where('status',1)->count();
        //ventas
        $totalVentas=Venta::count();
        //ventas por mes
        $ventasPorMes=Venta::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('COUNT(*) as total')    
            
        )->groupBy('mes')
         ->orderBY('mes','ASC')
         ->get();
        //obtener meses
        $meses=$ventasPorMes->pluck('mes')->map(function($mes){
            return date('F',mktime(0,0,0,$mes,1));
        });
        $totales=$ventasPorMes->pluck('total');

        return view('dashboard',compact([
            'totalClientes',
            'totalVentas',
            'totalProductos',
            'productosEnStock',
            'totalCategorias',
            'activasCategorias',
            'meses',
            'totales'

        ]));

    }
}
