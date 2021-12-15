
<x-app-layout>
    <x-slot name="header">
    </x-slot>
          
            
            <div style="margin-top: 1%" class="card" id = "stores">
                <div class="card-header d-flex justify-content-between align-items-center" style="background: #00b19d">
                    <h3 style="font: bold; color: white">Cotizacion</h3>
                    <div class="d-flex ">
                        <a class="btn " style="font-size: 20px; color: white" href="{{Route('createquote')}}">&#x271a;</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>  
                                    <th>Cliente</th>
                                    <th>Tipo de factura</th>
                                    <th>Numero de factura</th>
                                    <th>Monto</th>
                                    <th>Vendedor</th>
                                    {{-- @if ( Auth::user()->role_id == 1) --}}
                                    <th>Acciones</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($quotes))
                                @foreach($quotes as $quote)
                                <tr>
                                    <td>{{ $quote->client->name . " " . $quote->client->lastname}}</td>
                                    <td>{{ $quote->tipo_factura}}</td>
                                    <td><a href="{{Route('showquote', $quote->id)}}">{{ $quote->no_quote }}</a></td>
                                    <td>{{ $quote->monto}}</td>
                                    <td>{{ $quote->user->name}}</td>
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


     