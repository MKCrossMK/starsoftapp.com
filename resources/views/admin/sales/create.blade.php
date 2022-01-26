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
            <a class="btn btn-info"  style="color: white;font-weight: bold" href="{{ route('indexsale') }}" >Lista de ventas</a>

        <div class="card-body">
            <h2 style="text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Nueva Factura</h2>  </div>
        </div>
        <div class="container" id="saleform">
               
              <form action="{{ route('storesale') }}" method="POST" autocomplete="off">
                @csrf

        
                    <div class="card" style=" padding: 1%" >
                        <div class="form-row">
                            <div class="col">
                                <label for="product_name">Tipo de factura :</label>
                                <input hidden type="text" class="form-control" placeholder="documento" name="documento"  id="documento" readonly  required>
                                <input hidden type="text" class="form-control" placeholder="tipo_fac" name="tipo_fac"  id="tipo_fac" readonly required>
                                <select class="form-control" style="text-align: center" name="tipo_factura" id="tipo_factura"  required>
                                    <option disabled selected> Elige tipo de factura...</option>
                                    <option value="{{$fc}}">Factura Contado</option>
                                    <option value="{{$fcr}}">Factura Credito</option>       
                                    {{-- Agregar variable con tipo de factura desde clients BD Table --}}
                                </select>   

                            </div>
                            <div class="col">
                                <label for="code_referencia">Tipo de NCF :</label>
                                <select class="form-control" style="text-align: center" name="tipo_ncf" id="tipo_ncf"  required>
                                    <option disabled selected> Elige tipo de nfc...</option>
                                    <option value="{{$consumo}}">Factura de consumo</option>
                                    <option value="{{$fiscal}}">Factura valida credito fiscal</option>
                                </select>        
                            </div>
                         </div>

                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Nª de factura" name="no_factura" id="no_factura" style="text-align: center" oninvalid="alert('Elegir Tipo de Factura');" required readonly>

                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="NCF" name="ncf" id="ncf" style="color: red; text-align: center" oninvalid="alert('Elegir Tipo NCF');"  required readonly>
                                <input hidden type="text" class="form-control"  name="ncf"  id="sigConsumo" value="{{$sigConsumo}}" readonly>
                                <input hidden type="text" class="form-control"  name="ncf"  id="sigFiscal" value="{{$sigFiscal}}" readonly>
                            </div>
                         </div>

                         <hr>

                         <div>
                            <label style="color: #000;" for="cedula_rnc">Contacto </label>
                            <input class="form-control" name="cedula_rnc" placeholder="Cedula o RNC"  id="cedula_rnc" onkeypress="return isNumber(event)" required>
                         </div>

                         <div class="form-row" style="margin-top: 10px">
                            <div class="col">
                                <input type="text" class="form-control" name="cliente_name" placeholder="Nombre de Cliente" id="clientename" required >
                                <input type="text" class="form-control" name="client_id" placeholder="ID" id="cliente_id" required hidden>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="cliente_company" placeholder="Compañia" id="clientcompany"  required>
                               
                            </div>
                         </div>
   
                        <hr>

                        <div class="form-group col-sm-6 flex-row d-flex">
                            <label for="fecha" class="col-sm-6 col-form-label">Fecha</label>
                            <input type="" class="form-control" name="fecha" value="{{$dt}}" id="fecha" style="border: 0; text-align: center; background: #fff" readonly>
                    
                        </div>
                    </div>

                    
        {{-- Product Detail --}}


                            <div class="card" style="width: 100%;padding: 1%" >
                                <div style="background: #00b19d;">
                                    <h6 style="font: bold; color: white"> <span style="font-size: 20px">&#x1f3f7;</span> Productos a facturar</h6>
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
                                    <i data-feather="plus-circle"></i> Agregar Producto
                                </button>
                                
                            </div>


                        
                        <div class="card" style="width: 100%;padding: 1%" >
                            <div style="background: goldenrod">
                                <h6 style="font: bold; color: white"> <span style="font-size: 20px"> &#x1f4b0;&#xfe0e;</span> Forma de pago</h6>
                            </div>
                
                        <div class="card-body px-0 pb-0">

                               
                            <div class="form-row">
                                <div class="col" style="margin-bottom: 1%">
                                    <select class="form-control" name="tipo_pago" id="tipo_pago">
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                                        <option value="Cheque">Cheque</option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col" >
                                    <select class="form-control" name="banco_cheque" id="banco_cheque" required>
                                        <option selected disabled>Nombre de Banco</option>
                                        @foreach($bancos as $banco)
                                        <option value="{{$banco->f_nombre}}">{{$banco->f_nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="col">
                                <input required class="form-control" placeholder="Nº de Cheque" type="text" id="no_cheque"  name="no_cheque"  onkeypress="return isNumber(event)">

                            </div>
                                
                            </div>
                        </div>
                    </div>
            
                          
    
                    <div class="card" style="width: 100%; padding: 2%;" >
        
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
                        <button type="submit" id="facturar" class="btn btn-success float-right">Realizar Factura</button>
                         <a href="{{route('indexsale')}}" class="btn btn-danger">
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
                    <h3 style="font: bold; color: white; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">Seleccionar Producto</h3>
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
                                @if(!empty($products))
                                @foreach($products as $product)
                                <tr>
                                    <td  class="table-products__items" style="height: 70px" onclick="producto_facturar({{$product->id}})">
                            
                                        <div>
                                        <p class="table-products__p">{{$product->descripcion}}</p>
                                        <p> Ref.:  {{$product->code}}</p>
                                        </div> 
                                        <div>       
                                            <p style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight: bold;margin: 0 auto;"> RD${{$product->precio}}</p>
                                        </div> 
                                        <div hidden>
                                        <input id="productItem_id{{$product->id}}" type="text" value="{{$product->id}}">
                                        <input id="productItem_desc{{$product->id}}" type="text" value="{{$product->descripcion}}">
                                        <input id="productItem_code{{$product->id}}" type="text" value="{{$product->code}}">
                                        <input id="productItem_stock{{$product->id}}" type="text" value="{{$product->stock}}">
                                        <input id="productItem_precio{{$product->id}}" type="text" value="{{$product->precio}}">
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
                                        <label for="product_name">Producto</label>
                                        <input type="text"  id="product_name"  class="form-control formatProductInput" readonly="readonly">
                                        <input type="text"  id="product_id"    class="form-control"  hidden>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="code_referencia">Referencia</label>
                                        <input type="text"  id="code_referencia"  class="form-control formatProductInput"  readonly="readonly">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-products__items">
                                        <label for="price">Precio </label>
                                        <input type="text" class="form-control prodItem formatProductInput"  id="precio" readonly="readonly" >
                                        <input type="text"  id="stock"  class="form-control" hidden>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-products__items">
                                        <label for="">Cantidad</label>
                                        <input type="number" class="form-control prodItem formatProductInput"  id="cantidad" min="0" max="100" value="1" onkeypress="return isNumber(event)" >
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-products__items">
                                        <label for="itbis">Impuesto || ITBIS </label>
                                        <select class="form-control prodItem formatProductInput"  id="itbis">
                                        <option disabled>ITBIS</option>
                                        <option value="18" selected>18 %</option>
                                        <option value="0">0 %</option>
                                        </select>
                                    </td>
                                </tr>
                               <tr>
                                   <td class="table-products__items">
                                    <label for="descuento">Descuento</label>
                                    <select class="form-control prodItem formatProductInput"  id="descuento">
                                        <option disabled>Descuento</option>
                                        <option value="90">90 %</option>
                                        <option value="80">80 %</option>
                                        <option value="50">50 %</option>
                                        <option value="30">30 %</option>
                                        <option value="20">20 %</option>
                                        <option value="10">10 %</option>
                                        <option value="5">5 %</option>
                                        <option value="0" selected>0 %</option>
                                      </select> 
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
            
         
        
  
</body>



</x-app-layout>