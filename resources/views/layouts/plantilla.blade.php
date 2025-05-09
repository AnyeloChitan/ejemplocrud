<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
     @vite(['resources/css/app.css']) 

     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos-tablas.css')}}">   
    <link rel="stylesheet" href="{{asset('css/estilos-formularios.css')}}">
    <link rel="stylesheet" href="css/estilos-alerta.css">
    
    
</head>

<body>
  <!-- slidebar   -->
   <aside class="slidebar" id="slidebar">
   
    <a href=" {{route('welcome')}}" class="logo">
        <img src="{{asset('img/cangrejo.png')}}" alt="Logo" class="logo-img">
        <p class="logo-text">Tienda</p>
      </a>
    
    <!-- PERFIL -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn profile">
         <span><img src="{{asset('img/face3.png')}}" alt="avatar"></span>
         <p>{{ Auth::user()->name }}</p>
        </div>
        <div class="element-slidebar-content">
            <a href="{{route('profile.edit')}}">Perfil</a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
               <input type="submit" value="Salir" class="logout-link">

             </form>

        </div>
    </div>
     <!-- DashBOard -->

     <div class="element-slidebar-btn">
        <span><img  src="{{asset('img/compras.png')}}" alt="Product"></span>
        <a href="{{route('dashboard')}}">Dashboard</a>         
       </div>
     <!-- Categorias -->
         
        <div class="element-slidebar-btn">
         <span><img  src="{{asset('img/category.png')}}" alt="Product"></span>
         <a href="{{route('categoria.index')}}">Categorias</a>
        </div>
       
  
    <!-- Productos -->
    
    
        <div class="element-slidebar-btn">
         <span><img  src="{{asset('img/rokrt.png')}}" alt="Product"></span>
         <a href="{{route('producto.index')}}">Productos</a>
       
        </div>
        
     
    <!-- Provedores -->
   
        <div class="element-slidebar-btn">
         <span><img  src="{{asset('img/provedores.png')}}" alt="Provedor"></span>      
         <a href="{{route('categoria.index')}}">Provedores</a>
        </div>
       
    
   
       
        <!-- Ventas -->
        
            <div class="element-slidebar-btn">
             <span><img  src="{{asset('img/ventas.png')}}" alt="ventas"></span>
             <a href="{{route('categoria.index')}}">Ventas</a>
            </div>
           
    </div>
   </aside>

   <!-- main -->
   <main class="main">
    <!-- header -->
    <header class="header">
        <div class="titulo-nav">@yield('titulomain')</div>  

        <button id="menu-toggle" class="menu-hamburger">☰</button>
    </header>
    {{-- aqui se coloca todos los elmentos cambiantes --}}
      
      @yield('contenido')

   </main>
   @if (session('success'))
    <div id="success-message" class="alerta success">
        <p class="text-center font-bold">{{ session('success') }}</p>
    </div>

    <script>
        // Ocultar el mensaje después de 5 segundos
        setTimeout(() => {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000); // 5000 ms = 5 segundos
    </script>
   @endif
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>