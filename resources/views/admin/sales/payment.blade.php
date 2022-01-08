
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
            </div>
           

            
            <div style="margin-top: 1%" class="card" id = "stores">
                <div class="card-header" style="background: #00b19d">
                <div class="d-flex justify-content-between align-items-center" >
                    <h3 style="font: bold; color: white; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Recibos</h3>
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
                                                   <div id="object4"> <h6> Deuda: {{$sale->balance}}</h6></div>
                                                   
                                                   
                                                </div>
                                              </div>

                                        </a>
                                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#reportModal{{$sale->id}}"> Pagar</button> 
                                        <!-- Modal --> 
                                        <div class="modal fade" id="reportModal{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
                                        <div class="modal-dialog" role="document">     
                                       <div class="modal-content"> 
                                           <div class="modal-header"> 
                                              <h5 class="modal-title" id="exampleModalLabel">Pagar Recibo</h5>
                                         
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> 
                                    </button> 
                                    </div> 
                                        <div class="modal-body"> 
                                                                    
                                        <form action="{{ route('updatepaysale',  $sale->id) }}" method="POST" autocomplete="off">
                                            @csrf
                                            @method('PATCH')
                                        <div class="block" style="background: none">
                                        <div class="block-content" style="border-radius: 10px; padding: 5%; background: #10a9d3;">
                                        <h3 style="color: white; text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Hacer Pago</h3>
                                        </br></br>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group padding-top">
                                                    <input type="text" name="balance" class="form-control oval" placeholder="Total a pagar" required/>
                                                </div>
                                            </div>
                                        
                                        <div class="row padding-top" style="margin-top: 10%">
                                            <div class="col text-center">
                                                <button type="submit" style=" background-color: white; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; width: 70%; color: #10a9d3" class="btn btn-hero btn-lg">
                                                    Realizar Cobro
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                                                                        
                                        </div> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                        </div> 
                                          </div> 
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


     