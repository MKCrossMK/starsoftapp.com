
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" defer>
    
    <script>
        $(document).ready(function() {
    $('#saleTable').DataTable({
        "language": {
            "search":         "Buscar:",
            "lengthMenu":     "Mostrar _MENU_ entradas",
            "zeroRecords":    "No se encontraron registros coincidentes",
            "emptyTable":     "No hay datos disponibles en la tabla",
            "info":           "Mostrando _START_ to _END_ of _TOTAL_ entradas",
            "searchPlaceholder" : "Buscar factura",
            "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Siguiente",
        "previous":   "Anterior"
    },

            
        }
    });
});

    </script>


            <div class="btn-flotante">
                <a class="btn linkflotante" style="margin-left: 0%" href="{{Route('createsale')}}">+</a>
            </div>2
           

            
            <div style="margin-top: 1%" class="card" id = "stores">
                <div class="card-header" style="background: #00b19d">
                <div class="d-flex justify-content-between align-items-center" >
                    <h3 style="font: bold; color: white; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Despachos</h3>
                    <div class="d-flex ">
                        <a class="btn " style="font-size: 20px; color: white" href="{{Route('createsale')}}">&#x271a;</a>
                    </div>
                </div>

               </div>


                <div  class="card-body px-0 pb-0">
                    <div class="table-responsive" >
                        <table style=" margin-left:auto; margin-right: auto;" class='table table-striped' id="saleTable" >
                           
                            <thead >
                                <tr hidden>
                                    <th>Name</th>
                                   
                
                                </tr>
                            </thead>
                            
                            <tbody>

                                <tr>
                                    <td>

                                        <div class="contenido">

                                        <div class="izquierda">
                                        <a  class="btn" >
                                            <div id="content">
                                                <div id="left">
                                                   <div id="object1" ><h6> E: Fulano X</h6></div>
                                                   <div id="object3"><p>Nª Factura: 25</p></div>
                                                </div>
                                              
                                                <div id="right">
                                                   
                                                   <div id="object4"> <h6>Direccion: Calle 2, Los Cacaos, La Romana </h6></div>
                                                   
                                                   
                                                </div>
                                              </div>
                                              
                                        </a>
                                    </div>
                                    <div class="derecha">


                                        <form action="/action_page.php">
                                        <input type="radio" id="salido" name="status" value="Salido">
                                        <label for="salido">Salido</label><br>
                                        <input type="radio" id="entregado" name="status" value="Entregao">
                                        <label for="entregado">Entregado</label><br>
                                        </form>
                                    </div>
                                </div>
                                
                                    

                                     </td>
                                   
                                </tr>
                                {{-- @if(!empty($sales))
                                @foreach($sales as $sale)
                                <tr> --}}
                                   
                                        {{-- <a  class="btn" href="{{Route('showsale', $sale->id)}}">
                                            <div id="content">
                                                <div id="left">
                                                   <div id="object1" ><h6> {{$sale->client->name . " " . $sale->client->lastname}}</h6></div>
                                                   <div id="object2"><p>{{$sale->fecha}}</p></div>
                                                </div>
                                              
                                                <div id="right">
                                                   <div id="object3"><p>Nª Factura: {{ $sale->no_factura }}</p></div>
                                                   <div id="object4"> <h6> Deuda: {{$sale->balance}}</h6></div>
                                                   
                                                   
                                                </div>
                                              </div>

                                        </a> --}}
                                </td>
                                </tr>
{{--                            
                                @endforeach
                                @else

                                <h1 style="text-align: center">No hay datos</h1>

                                    
                                @endif --}}
                            </tbody>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
</x-app-layout>


     