<div class="relative">
    <button wire:click="toggleCarrito" class="relative">
        🛒<span class="badge">{{$cartCount}}</span>
    </button>
    @if($mostrarCarrito)
   
            @livewire('carrito')
      
      
    @endif
</div>
