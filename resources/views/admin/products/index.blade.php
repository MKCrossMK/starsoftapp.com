
<x-app-layout>
    <x-slot name="header">
    </x-slot>
            
            
            <div style="margin-top: 1%" class="card" id = "stores">
                <div class="card-header d-flex justify-content-between align-items-center" style="background: #00b19d">
                    <h3 style="font: bold; color: white">Productos</h3>
                    <div class="d-flex ">
                        <a class="btn " style="font-size: 25px; color: white"  href="{{Route('createproducto')}}">&#x271a;</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th hidden>Costo</th>
                                    <th>Stock</th>
                                    {{-- @if ( Auth::user()->role_id == 1) --}}
                                    <th>Acciones</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($products))
                                @foreach($products as $prod)
                                <tr>
                                    <td>{{ $prod->code}}</td>
                                    <td><a href="{{Route('showproducto', $prod->id)}}">{{ $prod->descripcion}}</a></td>
                                    <td>{{ $prod->precio}}</td>
                                    <td hidden>{{ $prod->costo}}</td>
                                    <td>{{ $prod->stock}}</td>
                                    <td> <a href="{{ route('editproducto', $prod->id) }}" class="btn btn-info" >Editar</a></td>
                                    <td>
                                      
                                </tr>
                                @endforeach
                                @else

                                <h1>No hay datos</h1>

                                    
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
</x-app-layout>


     