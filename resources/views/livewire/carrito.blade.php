<div>
    <h3>Carrito</h3>

    @forelse($productos as $producto)
    <div class="mb-2">
        <strong>{{$producto['producto']['nombre']}}</strong>
        Cantidad:{{ $producto['cantidad'] }}

    </div>
    @empty
    <p>No hay productos en el carrito</p>
    @endforelse
    @if(count($productos)>0)
    <button wire:click="vaciarCarrito">Vaciar carrito</button>
    @endif
</div>
