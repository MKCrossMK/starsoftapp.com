
<x-app-layout>
    <x-slot name="header">
    </x-slot>
            <a class="btn btn-info" style="margin-left: 2%" href="{{Route('createsale')}}">Nueva Facturacion</a>
            
            <div style="margin-top: 5%" class="card" id = "stores">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 style="font: bold">Venta</h3>
                    <div class="d-flex ">
                        <a href="#"><i data-feather="download"></i></a>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>
                                    <th>Tipo de factura</th>
                                    <th>Numero de factura</th>
                                    <th>Monto</th>
                                    <th>Cliente</th>
                                    <th>Vendedor</th>
                                    {{-- @if ( Auth::user()->role_id == 1) --}}
                                    <th>Acciones</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($sales))
                                @foreach($sales as $sale)
                                <tr>
                                    <td>{{ $sale->tipo_factura}}</td>
                                    <td><a href="{{Route('showsale', $sale->id)}}">{{ $sale->no_factura }}</a></td>
                                    <td>{{ $sale->monto}}</td>
                                    <td>{{ $sale->client->name}}</td>
                                    <td>{{ $sale->user->name}}</td>
                                    {{-- <td> <a href="{{ route('editsale', $cli->id) }}" class="btn btn-info" >Editar</a></td> --}}
                                    <td>
                                      
                                </tr>
                                @endforeach
                                @else

                                <h1 style="text-align: center">No hay datos</h1>

                                    
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
</x-app-layout>


     