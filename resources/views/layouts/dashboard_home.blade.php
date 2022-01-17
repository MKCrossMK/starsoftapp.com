<x-app-layout>
    <x-slot name="header">
    </x-slot>

        
    
    <div>
        <div style="text-align: center">
            <h2>Pagina Principal</h2>
            <p class="text-subtitle text-muted">Bienvenido, elija lo que desea realizar </p>
        </div>


                    <div class="dashHome">
                        <div class="card-style" >
                            <a href="{{ route('createsale') }}">
                                <div style="text-align: center">
                                   <i class="feather-32" data-feather="file-plus" style="color: white"></i>
                                    <h3 class='card-title' style="color: white">Facturar</h3>
                                </div>                                 
                            </a>          
                        </div>
                
                        <div class="card-style" >
                            <a href="{{ route('createquote')}}">
                                <div style="text-align: center">
                                    <i class="feather-32" data-feather="trello" style="color: white"></i>
                                    <h3 class='card-title' style="color: white">Cotizar</h3>
                                </div>               
                            </a>          
                        </div>
                        
                        <div class="card-style" >
                            <a href="{{ route('indexdispatches') }}">  
                                <div style="text-align: center">
                                    <i class="feather-32" data-feather="truck" style="color: white"></i>
                                    <h3 class='card-title' style="color: white">Despachos</h3>
                                </div>
                            </a>          
                        </div>
                        
                        <div class="card-style" >
                            <a href="{{ route('createcliente') }}">    
                                <div style="text-align: center">
                                    <i class="feather-32" data-feather="user-plus" style="color: white"></i>
                                    <h3 class='card-title' style="color: white">Crear cliente</h3>
                                </div>        
                            </a>          
                        </div>

                    </div>


       

    

    </div>
</div>

</x-app-layout>