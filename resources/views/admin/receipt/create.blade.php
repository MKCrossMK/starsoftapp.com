<x-app-layout>
<body >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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
            "searchPlaceholder" : "Buscar Producto",
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


    <div class="box">
           <div id="invoces-body">
            <div class="card">
            <a class="btn btn-info"  style="color:white; font-weight: bold" href="{{route('indexreceipt')}}">Lista de Recibos</a>

        <div class="card-body">
            <h2 style="text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Nuevo Recibo</h2> 
         </div>
        </div>
        <div class="container" id="saleform" >
               
              <form action="{{ route('storereceipt') }}" method="POST" autocomplete="off">
                @csrf
        

                    {{-- Card  --}}

                    <div class="card" style="width: 100%; padding: 1%" >

                        <div class="form-group col-sm-6 flex-row d-flex">
                            <label for="fecha" class="col-sm-6 col-form-label">Fecha</label>
                             <input type="" class="form-control" name="fecha" value="{{$dt}}" id="fecha" style="border: 0; text-align: center; background: #fff" readonly>
                    
                            </div>

                            <div class="form-group col-sm-6 flex-row d-flex">
                                <label for="fecha" class="col-sm-6 col-form-label">Vencimiento</label>
                                <input type="date" class="form-control" name="fecha_vencimiento" id="fecha" style="border: 0; text-align: center; background: #fff" required>
                        
                             </div>

                    </div>


                  
        {{-- Product Detail --}}

        <div class="card" style="width: 100%;padding: 1%" >
            <div style="background: #00b19d;">
                <h6 style="font: bold; color: white"> <span style="font-size: 20px">&#x1f3f7;</span> Factura/s a procesar</h6>
            </div>

        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class='table mb-0' id="detalles" >
                    <tbody>
                      
                      <tr>


                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="button" id="agregar_producto" class="btn float-center" style="color: #00b19d;" onclick="tableProductos()">
            <i data-feather="plus-circle"></i> Agregar Factura
        </button>
        
    </div>


    <div class="card" style="width: 100%;padding: 1%" >
        <div style="background: goldenrod">
            <h6 style="font: bold; color: white"> <span style="font-size: 20px"> &#x1f4b0;&#xfe0e;</span> Monto</h6>
        </div>

    <div class="card-body px-0 pb-0">

        <div class="form-row">
            <div class="col" >
               <label for="balance">Monto a Pagar</label>
            </div>
            <div class="col">
                <input  class="form-control" placeholder="Monto a pagar" type="text" id="balance"  name="balance"  onkeypress="return isNumber(event)" required>
            </div>
        </div>

        <div class="form-row" style="margin-top: 10px">
            <div class="col" >
               <label for="balance">Concepto</label>
            </div>
            <div class="col">
                <textarea style="text-align: center" name="concepto" id="concepto" required placeholder="Concepto Recibo"></textarea>
            </div>
        </div>
        
    </div>
</div>




    <div id="totalprueba" class="card" style="width: 100%; padding: 2%;" >
    <div class="form-row">
            <div class="col" style="display: flex; justify-content: space-between">
                <p>TOTAL:</p>
                <p><span id="total">DOP $ 0.00</span></p>

            </div>
    </div>
    <div class="form-row">
            <div class="col" style="display: flex; justify-content: space-between">
                <p>TOTAL IMPUESTO:</p>
                <p><span id="total_impuesto">DOP $ 0.00</span><input type="hidden" id="imp_itbis" name="imp_itbis"></p>

            </div>
    </div>
    <div class="form-row">
        <div class="col" style="display: flex; justify-content: space-between">
            <p>TOTAL PAGAR:</p>
            <p><span id="total_pagar_html">DOP $  0.00</span> <input type="hidden"
                  id="total_pagar" name="monto"></p>
        </div>
    </div>
    </div>

   
                    
                    
            
                    <div class="card-footer text-muted">
                        <button type="submit" id="facturar" class="btn btn-success float-right">Realizar Recibo</button>
                         <a href="{{route('indexquote')}}" class="btn btn-danger">
                            Cancelar
                         </a>
                    </div>
        
                </form>
            </div>

        </div>

        {{-- Tabla de productos, cargar de forma transi --}}
        <div id="table-productos" class="hidden">  

          
            <div class="card" id = "stores">
                <div class="card-header" style="background: #00b19d">
                <div class="d-flex justify-content-between align-items-center" >            
                    <h3 style="font: bold; color: white; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">Seleccionar Factura/s</h3>
                    <button class="btn btn-danger" style="font-size: 20px; color: #fff" onclick="cancelarTableProductos()">Cancelar</button>
                  
                </div>

               </div>


                <div  class="card-body px-0 pb-0" style="padding: 2%">
                    <div class="table-responsive">
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
                                    <td  class="table-products__items" style="height: 70px" onclick="producto_facturar({{$product->id}})">
                            
                                        <div>
                                        <p class="table-products__p">{{$sale->documento}}</p>
                                        <p> Nº Factura:  {{$sale->no_factura}}</p>
                                        </div> 
                                        <div>       
                                            <p style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight: bold;margin: 0 auto;"> RD${{$sale->monto}}</p>
                                        </div> 
                                        <div hidden>
                                        <input id="factItem_id{{$sale->id}}" type="text" value="{{$sale->id}}">
                                        <input id="factItem_id_erp{{$sale->id}}" type="text" value="{{$sale->id_erp}}">
                                        <input id="factItem_documento{{$sale->id}}" type="text" value="{{$sale->documento}}">
                                        <input id="factItem_desc{{$sale->id}}" type="text" value="{{$sale->ncf}}">
                                        <input id="factItem_desc{{$sale->id}}" type="text" value="{{$sale->no_factura}}">
                                        <input id="factItem_code{{$sale->id}}" type="text" value="{{$sale->monto}}">
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
        {{-- Producto a facturar en la siguiente Vista --}}
        <div id="proditem_facturar" class="hidden">

            <div class="card" id = "stores">
                <div class="card-header" style="background: #00b19d">
                <div class="d-flex justify-content-between align-items-center" >            
                    <h3 style="font: bold; color: white; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">Producto</h3>
                    <button class="btn btn-danger" style="font-size: 20px; color: #fff" onclick="cancelarTab_Productos()" style="">Cancelar</button>
                  
                </div>

               </div>


                <div  class="card-body px-0 pb-0" style="padding: 2%">
                    <div class="table-responsive" >
                        <table style=" margin-left:auto; margin-right: auto;" class='table' >
                           
                            <thead >
                                <tr hidden>
                                    <th>Name</th>
                                   
                                </tr>
                            </thead>
                            
                            <tbody>
                               
                                <tr>
                                    <td>
                                        <label for="sale_documento">Documento</label>
                                        <input type="text"  id="sale_documento"  class="form-control formatProductInput" readonly="readonly">
                                        <input type="text"  id="sale_id"    class="form-control"  hidden>
                                        <input type="text"  id="sale_id_erp"    class="form-control"  hidden>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-products__items">
                                        <label for="sale_no_factura">Nº Factura </label>
                                        <input type="text" class="form-control prodItem formatProductInput"  id="sale_no_factura" readonly="readonly" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="sale_ncf">NCF</label>
                                        <input type="text"  id="sale_ncf"  class="form-control formatProductInput"  readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-products__items">
                                        <label for="sale_monto">Monto</label>
                                        <input type="text" class="form-control prodItem formatProductInput"  id="sale_monto"  onkeypress="return isNumber(event)" >
                                    </td>
                                </tr>
                              
                        
                            </tbody>
                        </div>
                        </table>
                    </div>
                </div>
                <button type="button"  id="agregarproducto" class="btn btn-primary float-center">Agregar producto</button>
            </div>
        </div>
      
        </div>
        </div>
      
    </div>
    
    

{{-- Tabla de Productos  --}}




        

        
  
</body>



</x-app-layout>