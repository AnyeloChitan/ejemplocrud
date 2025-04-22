<?php

namespace App\Livewire;
use App\Models\Producto;
use Livewire\WithPagination;
use Livewire\Component;

class CatalogoProductos extends Component
{
    use WithPagination; 
    public $search='';
    public function render()
    {

        $productos = Producto::where('stock', '>', 0)
        ->where('nombre', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'DESC')->paginate(6);
        return view('livewire.catalogo-productos',compact('productos'));
    }
}
