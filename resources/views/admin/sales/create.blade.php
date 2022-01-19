<x-app-layout>
<body >
        
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

                         <div class="form-row">
                            <div class="col">
                                <label style="color: #000;" for="cedula_rnc">Contacto </label>
                                <input class="form-control" name="cedula_rnc" placeholder="Cedula o RNC"  id="cedula_rnc" onkeypress="return isNumber(event)" required>
                            </div>
                            <div class="col">
                                <label  for="cedula_rnc">Nombre </label>
                                <input type="text" class="form-control" name="cliente_name" placeholder="Cliente" id="clientename" required >
                                <input type="text" class="form-control" name="client_id" placeholder="ID" id="cliente_id" required hidden>
                            </div>
                         </div>
   
                        <hr>

                        <div class="form-group col-sm-6 flex-row d-flex">
                            <label for="fecha" class="col-sm-6 col-form-label">Fecha</label>
                            <input type="" class="form-control" name="fecha" value="{{$dt}}" id="fecha" style="border: 0; text-align: center; background: #fff" readonly>
                    
                        </div>
                    </div>

                    
        {{-- Product Detail --}}

                            <div class="card" style="width: 100%; padding: 2%; border-top-color:#00b19d; border-top: 10px solid" >
                                            
                                <div class="form-row">
                                        <div class="col">
                                            <label for="product_name">Producto</label>
                                            <input type="text"  id="product_name"  class="form-control">
                                            <input type="text"  id="product_id"    class="form-control" hidden >
                                        </div>
                                        <div class="col">
                                            <label for="code_referencia">Referencia</label>
                                            <input type="text"  id="code_referencia"  class="form-control" >
                                        </div>
                                </div>


                                <div class="form-row">
                                    <div class="col">
                                        <label for="stock">Stock</label>
                                        <input type="text"  id="stock"  class="form-control" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="price">Precio </label>
                                        <input type="text" class="form-control precio"  id="precio" readonly >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Cantidad</label>
                                        <input type="number" class="form-control"  id="cantidad" min="0" max="100" value="1" >
                                    </div>
                                    <div class="col">
                                        <label for="itbis">ITBIS </label>
                                        <select class="form-control itbis"  id="itbis">
                                            <option disabled>ITBIS</option>
                                            <option value="18" selected>18 %</option>
                                            </select>   
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="descuento">Descuento</label>
                                        <select class="form-control"  id="descuento">
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
                                    </div>
                                </div>

                                    <div class="form-group" style="text-align: center; margin-top: 2%">
                                        <button type="button"  id="agregarproducto" class="btn btn-primary float-center">Agregar producto</button>
                                    </div>

                            </div>

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
         
        
  
</body>



</x-app-layout>