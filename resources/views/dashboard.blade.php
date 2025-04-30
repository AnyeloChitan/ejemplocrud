@extends('layouts.plantilla')

@section('titulomain')
Dashboard
@endsection

@section('contenido')
<section class="container-cards">
     <!-- productos -->
 <div class="card">
    <div class="cabecera">
        <img src="img/rokrt.png" alt="">
        <div class="cabecera-text">
            <p>Total</p>
            <h2>{{$totalProductos}}</h2>
        </div>
        <div class="cabecera-text">
         <p>Con Stock</p>
         <h2>{{$productosEnStock }}</h2>
     </div>
     
       
    </div>
    <h2>Productos</h2>
 </div>
  <!-- Categoria -->
  <div class="card">
    <div class="cabecera">
        <img src="{{asset('img/icono1.png')}}" alt="gkfg">
        <div class="cabecera-text">
            <p>Total</p>
            <h2>{{$totalCategorias}}</h2>
        </div>
        <div class="cabecera-text">
          <p>Activas</p>
          <h2>{{$activasCategorias}}</h2>
      </div>
       
    </div>
    <h2>Categorias</h2>
 </div>
  <!-- Clientes -->
  <div class="card">
    <div class="cabecera">
        <img src="{{asset('img/cliente.png')}}" alt="">
        
        <div class="cabecera-text">
            <p>Total</p>
            <h2>{{$totalClientes}}</h2>
        </div>
        
       
    </div>
    <h2>Clientes</h2>
</div>   
    <!-- Ventas -->
    
    <div class="card">
     <div class="cabecera">
         <img src="{{asset('img/ventas.png')}}" alt="">
         <div class="cabecera-text">
             <p>Total</p>
             <h2>{{$totalVentas}}</h2>
         </div>
        
     </div>
     <h2>Ventas</h2>
 </div>   
</section >

<section class="container-graficas">
    <div class="card">
     <h3>Ventas por Mes</h3>
     <canvas id="ventasPorMesChart"></canvas>
    </div>
    {{-- scripts para las graficas --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
    const ctx = document.getElementById('ventasPorMesChart').getContext('2d');
    const ventasPorMesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($meses) !!}, 
            datasets: [{
                label: 'Ventas por Mes',
                data: {!! json_encode($totales) !!}, 
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2, 
            fill: true, 
            tension: 0.4 
            }]
        },
        options: {
             responsive: true, 
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
 
 </section >

@endsection