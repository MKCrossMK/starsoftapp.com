<x-app-layout>
    <x-slot name="header"></x-slot>
            
            <div style="margin-top: 5%" class="card" id = "stores">
              
                <div class="card-header align-items-center">
                    <h3 style="font: bold">Detalle de Entrega</h3>
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width:350px;">
                                <div class="card-header" style="text-align: center"><h5>Informacion</h5></div>
                                <div class="card-body">
                                  <h1 class="card-title" >{{$dispatch->name_cliente}}</h1>
                                  <p class="card-text">Telefono : {{$dispatch->phone_cliente}}</p>
                                  <p class="card-text">Nº Factura : {{$dispatch->no_factura}}</p>
                                  <p class="card-text">Paquetes : {{$dispatch->bultos_paquetes}}     </p>
                                  <p class="card-text" style="color: black">Direccion : 
                                    {{$dispatch->address_municipio . " " . $dispatch->address_sector . " " . $dispatch->address_provincia }}</p>

                                  <p>Vendedor : {{$dispatch->name_vendedor}}</p>

                                  <h6>Estado: {{$dispatch->status}}</h6>


                                  <a href="{{Route('indexdispatches')}}" class="btn btn-primary" style="width: 100%">Volver</a>
                                </div>
                              </div>
                        </div>
                       
                    </div>



                </div>
            </div>
        
</x-app-layout>


     