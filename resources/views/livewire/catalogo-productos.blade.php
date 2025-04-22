<div>
  

  <div class="productosearch">
    <input type="text" wire:model.live="search" placeholder="Buscar producto..." class="search">
    
    @if ($search)
        <span wire:click="$set('search', '')" class="clear-icon">✕</span>
    @endif
   </div>

   <div class="productos-grid" >
    @foreach($productos as $producto)
        <div class="producto" >
            <img src="{{ asset('img/'.$producto->imagen) }}" alt="{{ $producto->imagen }}" >
            <h3>{{ $producto->nombre }}</h3>
            <p>Precio: ${{ $producto->precio_venta }}</p>
        </div>
    @endforeach

     @if($productos->isEmpty())
        <p>No se encontraron productos.</p>
    @endif 

</div>
 <div class="mt-4">
    {{ $productos->links('vendor.pagination.livewireDefault') }}
  </div>
 
</div>


