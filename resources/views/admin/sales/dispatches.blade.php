
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


            <div style="margin-top: 1%" class="card" id = "stores">
                <div class="card-header" style="background: #00b19d">
                <div class="d-flex justify-content-between align-items-center" >
                    <h3 style="font: bold; color: white; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Despachos</h3>
                  
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
                                @if(!empty($dispa))
                                @foreach($dispa as $sale)
                                <tr>
                                    <td style="height: 70px">
                                        <div class="contenido" >

                                            <div class="izquierda" >
                                            <a  class="btn btnlink" style="border: solid #00b19d 2px; background-color: white" href="{{Route('showdispatch', $sale->id)}}" >
                                                <div id="content2" style="padding: 1%">
                                                    <div id="left">
                                                        <div id="object1" ><h6> {{$sale->name_cliente}}</h6></div>
                                                    </div>
                                                    <div id="right">
                                                         <div id="object2">Factura : <h6>{{$sale->no_factura}}</h6></div> 
                                                    </div>
                                                  
                                                  </div>

                                <div id="object4" style="width: 100%"><p style="color: black">{{$sale->address_municipio .
                                              " " . $sale->address_sector .  " " .  $sale->address_provincia  }} </p></div>
                                                  
                                            </a>
                                        </div>
                                        <di class="derecha" style="margin: 2%">
    
                                            <form action="{{ route('updatedispatch', $sale->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                            <input type="radio" id="entregado{{$sale->id}}" onchange="this.form.submit();"
                                             name="status" {{$sale->status === "Entregado" ? "disabled" : " "}} value="Entregado">

                                            <label for="entregado{{$sale->id}}">Entregado</label><br>
                                            
                                            </form>

                                            <ps style="color: black">Estado:  {{$sale->status}}</p>
                                        </div>
                                    </div>
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

