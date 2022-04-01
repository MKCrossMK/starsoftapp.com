<x-app-layout>
    <x-slot name="header"></x-slot>
            
            <div style="margin-top: 5%" class="card" id = "stores">
              
                <div class="card-header ">
                    <h3 style="font: bold">Detalle de Clientes</h3>
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width:350px;"; height: 317px;">
                                <div class="card-header" style="text-align: center"><h5>Informacion</h5></div>
                                <div class="card-body">
                                  <h1 class="card-title" >{{$client->name . " || " . $client->company_name}}</h1>
                                  <p class="card-text">Cedula o RNC : {{$client->cedula_rnc}}</p>
                                  <p class="card-text">Direccion : {{$client->address . " " . $client->clientprovince->descripcion}}   </p>
                                  <p class="card-text">Telefono : {{$client->phone}}</p>
                                  <p class="card-text">2do Telefono : {{$client->second_phone}}</p>
                                  <p class="card-text">3er Telefono : {{$client->third_phone}}</p>
                                  <p>Correo Electronico : {{$client->email}}</p>
                                  <a href="{{Route('indexcliente')}}" class="btn btn-primary" style="width: 100%">Volver</a>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:350px ;">

                                <img src="{{asset('assets/images/contactfoto.png') }}" style="width:100%; alt="Imagen X cliente">
                                
                              </div>
                        </div>
                    </div>



                </div>
            </div>
        
</x-app-layout>


     