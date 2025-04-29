<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    //
    protected $fillable=['venta_id','producto_id','cantidad','precio_unitario','subtotal'];
       //relacion con cliente
  public function cliente(){
    return $this->belongsTo(Cliente::class,'cliente_id');
  }
    //relacion con detelle ventas

    public function detalles(){
        return $this->hasMany(DetalleVenta::class);
       }
}
