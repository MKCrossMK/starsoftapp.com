
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

            <a class="btn btn-info" style="margin-left: 2%" href="{{Route('createsale')}}">Nueva Facturacion</a>
            
            <div style="margin-top: 5%" class="card" id = "stores">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 style="font: bold">Venta</h3>
                    <div class="d-flex ">
                        <a href="#"><i data-feather="download"></i></a>
                    </div>
                </div>
                <div  class="card-body px-0 pb-0">
                    <div class="table-responsive" >
                        <table style=" margin-left:auto; margin-right: auto;" class='table' id="table1">
                           
                            <thead>
                                <tr>
                                    <th width="400px" style="text-align: center">Facturas</th>
                                    {{-- @if ( Auth::user()->role_id == 1) --}}
                                    <th>Acciones</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            
                            <tbody>
                                @if(!empty($sales))
                                @foreach($sales as $sale)
                                <tr>
                                    <td>
                                        <a style="width: 300px" class="btn" href="{{Route('showsale', $sale->id)}}">
                                        <div class="rpw">
                                            <div class="col">
                                            <p> {{$sale->client->name . " " . $sale->client->lastname}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <p>Tipo Factura: {{$sale->tipo_factura}}</p>
                                            </div>
                                            <div class="col">
                                            <p>Nª Factura: {{ $sale->no_factura }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <h6> Monto: {{$sale->monto}}</h6>
                                            </div>
                                          
                                        </div>

                                        </a>
                                    </td>
        
                                    <td>
                                    <a href="{{ route('showsale', $sale->id) }}" ><abbr title="Ver factura"><i  data-feather="eye" width="30"></i></abbr></a>
                                    <a href="{{ route('pdfsale', $sale->id) }}" ><abbr title="Imprimir PDF" ><i data-feather="printer" width="30"></i></abbr></a>
                                    
                                   
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


     