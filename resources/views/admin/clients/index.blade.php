
<x-app-layout>
    <x-slot name="header">
    </x-slot>
            
            
            <div style="margin-top: 1%" class="card" id = "stores">
                <div class="card-header d-flex justify-content-between align-items-center" style="background: #00b19d">
                    <h3 style="font: bold; color: white">Clientes</h3>
                    <div class="d-flex ">
                        <a class="btn" style="font-size: 25px; color: white" href="{{Route('createcliente')}}">&#x271a;</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Correo Electronico</th>
                                    {{-- @if ( Auth::user()->role_id == 1) --}}
                                    <th>Acciones</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($client))
                                @foreach($client as $cli)
                                <tr>
                                    <td>{{ $cli->cedula_rnc}}</td>
                                    <td><a href="{{Route('showcliente', $cli->id)}}">{{ $cli->name . " || " . $cli->company_name}}</a></td>
                                    <td>{{ $cli->address}}</td>
                                    <td>{{ $cli->phone}}</td>
                                    <td>{{ $cli->email}}</td>
                                    <td> <a href="{{ route('editcliente', $cli->id) }}" class="btn btn-info" >Editar</a></td>
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


     