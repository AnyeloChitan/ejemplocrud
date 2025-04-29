<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Carrito extends Component
{ public $productos=[];

   protected $listeners=['productoAgregado'=>'actualizarCarrito'] ;

   public function mount(){
    $this->productos=Session::get('cart',[]);
   }

   public function vaciarCarrito(){
    Session::forget('cart');
    $this->productos=[];
    //emitir evento producto agregado 
     $this->dispatch('productoAgregado');
   }

   public function actualizarCarrito(){
    $this->productos=Session::get('cart',[]);
   }

    public function render()
    {
        return view('livewire.carrito');
    }
}
