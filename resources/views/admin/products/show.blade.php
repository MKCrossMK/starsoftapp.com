<x-app-layout>
    <x-slot name="header"></x-slot>
            
            <div style="margin-top: 5%" class="card" id = "stores">
              
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 style="font: bold">Detalle de Productos</h3>
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width:400px; height: 317px;">
                                <div class="card-header" style="text-align: center"><h5>Informacion</h5></div>
                                <div class="card-body">
                                  <h1 class="card-title" >{{$product->descripcion}}</h1>
                                  <p class="card-text">Codigo : {{$product->code}}</p>
                                  <p class="card-text">Precio : {{$product->precio}}     </p>
                                  <p class="card-text">Stock : {{$product->stock}}</p>
                                  <p>Costo : {{$product->costo}}</p>
                                  <a href="{{Route('indexproducto')}}" class="btn btn-primary" style="width: 100%">Volver</a>
                                </div>
                              </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width:400px ;">

                                <img src="{{asset('assets/images/productshow.png') }}" style="width:400px; alt="Imagen X producto">
                                
                              </div>
                        </div>
                    </div>



                </div>
            </div>
        
</x-app-layout>


     