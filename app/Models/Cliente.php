<?php

namespace App\Models;
use App\Models\Venta;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //

    public function ventas(){
        return $this->hasMany(Venta::class);
    }
}
