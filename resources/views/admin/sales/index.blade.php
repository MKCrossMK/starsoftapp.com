
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

            <div class="btn-flotante">
                <a class="btn linkflotante" style="margin-left: 0%" href="{{Route('createsale')}}">+</a>
            </div>
           

            
            <div style="margin-top: 1%" class="card" id = "stores">
                <div class="card-header d-flex justify-content-between align-items-center" style="background: #00b19d">
                    <h3 style="font: bold; color: white; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Ventas - Facturaciones</h3>
                    <div class="d-flex ">
                        <a class="btn " style="font-size: 20px; color: white" href="{{Route('createsale')}}">&#x271a;</a>
                    </div>
                </div>
                <div  class="card-body px-0 pb-0">
                    <div class="table-responsive" >
                        <table style=" margin-left:auto; margin-right: auto;" class='table' id="table1">
                           
                            <thead>
                                <tr>
                                   
                
                                </tr>
                            </thead>
                            
                            <tbody>
                                @if(!empty($sales))
                                @foreach($sales as $sale)
                                <tr>
                                    <td>
                                        <a  class="btn" href="{{Route('showsale', $sale->id)}}">
                                            <div id="content">
                                                <div id="left">
                                                   <div id="object1" ><h6> {{$sale->client->name . " " . $sale->client->lastname}}</h6></div>
                                                   <div id="object2"><p>{{$sale->fecha}}</p></div>
                                                </div>
                                              
                                                <div id="right">
                                                   <div id="object3"><p>Nª Factura: {{ $sale->no_factura }}</p></div>
                                                   <div id="object4"> <h6> Monto: {{$sale->monto}}</h6></div>
                                                </div>
                                              </div>

                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else

                                <h1 style="text-align: center">No hay datos</h1>

                                    
                                @endif
                            </tbody>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
</x-app-layout>


     