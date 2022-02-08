
<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" defer>
    
    <script>
        $(document).ready(function() {
   var tableclient = $('#quoteTable').DataTable({
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
    }
         
        },      "aoColumns": [
           
            { "orderSequence": [ "desc" ] },
         
        ]
    })
});

    </script>

    
<style>
    .my_text
    {
        font-family: 'Courier New', Courier, monospace ;
      
    }
</style>

        <div class="btn-flotante">
            <a class="btn linkflotante" style="margin-left: 0%" href="{{Route('createquote')}}">+</a>
        </div>
          
            <div style="margin-top: 1%" class="card" id = "stores">
                <div class="card-header d-flex justify-content-between align-items-center" style="background: #00b19d">
                    <h3 style="font: bold; color: white">Cotizaciones</h3>
                    <div class="d-flex ">
                        <a class="btn " style="font-size: 20px; color: white" href="{{Route('createquote')}}">&#x271a;</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="quoteTable">
                            <thead>
                                <tr>  
                                    <th>Cotizacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($quotes))
                                @foreach($quotes as $quote)
                                <tr>
                                    <td>
                                        <a  class="btn" href="{{Route('showquote', $quote->id)}}">
                                            <div id="content" class="my_text">
                                                <div id="left">
                                                    <div id="object2"><p>{{$quote->fecha}}</p></div>
                                                   <div id="object1" style="font-weight: bold">{{$quote->client->name . " " . $quote->client->lastname}}</div>
                                                  
                                                </div>
                                              
                                                <div id="right">
                                                   <div id="object3"><p>Nª Cotizacion: {{$quote->no_quote }}</p></div>
                                                   <div id="object4" class="my_text" style="font-weight: bold">  RD$ {{number_format($quote->monto)}}</div>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
</x-app-layout>


     