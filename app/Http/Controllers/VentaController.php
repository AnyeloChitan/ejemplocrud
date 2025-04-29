<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\DetalleVenta;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;//para usar transacciones

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function procesarVentaCarrito(Request $request)
    {
        //
        // Verificar si el carrito existe en la sesión
        $carrito =Session::get('cart', []);

        if (empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
            }

        //iniciar transaccion    
        DB::transaction(function()use ($carrito,$request){
          //ontener cliente de pruba
          $totalVenta=0;
          $cliente =Cliente::find(1);

            //Crear venta
            $venta =Venta::create([
                'cliente_id'=>$cliente->id,    
                'descuento' =>0,
                'total' => 0,
            ]);
          //obtener los productos
          foreach ($carrito as $item) {
         $producto = Producto::find($item['producto']->id);

         if ( $producto->stock>=$item['cantidad'] && isset($item['cantidad'])) {
            $subtotal = $producto->precio * $item['cantidad'];
            $totalVenta+=$subtotal;
               // Crear el detalle de la venta
               DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $producto->id,
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $producto->precio,
                'subtotal' => $subtotal,
            ]);

            // Actualizar el stock del producto
            $producto->stock -= $item['cantidad'];
            $producto->save();

         }else{
            return redirect()->back()->with('error', 'producto sin stock');
          }

          }
          // Actualizar el total de la venta
          $venta->total = $totalVenta ;
          $venta->save();

        

        });

        Session::forget('cart');  
        return redirect()->back()->with('success', 'compra exitosa.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
