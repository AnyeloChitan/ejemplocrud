<div class="relative">
    <button wire:click="toggleCarrito" class="relative">
        🛒<span class="badge">{{$cartCount}}</span>
    </button>
    @if($mostrarCarrito)
        <div class="carrito-flotante">
            @livewire('carrito')
        </div>
      
    @endif
</div>
