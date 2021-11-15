<x-app-layout>
<body >
        
            <div class="card">
        <div class="card-body">
            <h2 style="text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Nueva Factura</h2>  </div>
        </div>
        <div class="container" id="saleform" style="margin: 2%">
               
              <form action="{{ route('storesale') }}" method="POST" autocomplete="off">
                @csrf
        
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-2">
                    
                        <a class="btn btn-info"  style="color: black;" href="https://www.google.es" >Lista de ventas</a>
                    </div>
        
        
        
                         <div class="form-group col-sm-5 flex-column d-flex"> 
        
                            <div class="col" style="margin-bottom: 1%">
                                <div class="row">
                                    <div class="col-3">
                                        <h1 class="col-sm-6 col-form-label><label for="ncf">NCF:</h1>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="NCF" name="ncf" value="B01111"  id="ncf" readonly>
                                    </div>
                                  </div>
                                </div>
        
        
                
                        </div>
                    
        
                    
        
        
                    <div class="row justify-content-between text-left" style="margin-top: 5%" >
                        <div class="form-group col-sm-6 flex-column d-flex">
        
                              <div class="col" style="margin-bottom: 1%">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="cedula_rnc" class="col-sm-6 col-form-label">Datos </label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" name="cedula_rnc" placeholder="Cedula o RNC"  id="cedula_rnc" required>
                                    </div>
                                  </div>
                                </div>
        
                
                                
        
                            <div class="col" style="margin-bottom: 1%">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="clientename" class="col-sm-6 col-form-label" >Cliente</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="client_id" placeholder="ID" id="cliente_id" required>

                                        <input type="text" class="form-control" name="cliente_name" placeholder="Cliente" id="clientename" required>
                                    </div>
                                </div>
                            </div>
        
                            
                            <div class="col" style="margin-bottom: 1%">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="phone" class="col-sm-6 col-form-label" >Telefono</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="phone" placeholder="Telefono" id="phone" required>
                                    </div>
                                </div>
                            </div>
        
                          
                       
                    </div>
        
                         <div class="form-group col-sm-6 flex-column d-flex"> 
        
                            <div class="col" style="margin-bottom: 1%">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="fecha" class="col-sm-6 col-form-label">Fecha</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="" class="form-control" name="fecha" value="{{$dt}}" id="fecha" style="border: none; text-align: center" readonly>
                                    </div>
                                  </div>
                                </div>
        
        
                    
                        </div>
                    
        {{-- Product Detail --}}
                


                    <div class="form-group">
                        <div class="table-responsive ">
                            <table id="" class="table-bordered">

                                <thead>
            
                                    
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td width='50px'>
                                            <div class="form-group" >
                                            <label for="product_id">id</label>
                                            <input type="text"  id="product_id"  class="form-control" required>
                                          </div>
                                        </td>
                                        <td width='300px'>
                                            <div class="form-group" >
                                            <label for="product_name">Producto</label>
                                            <input type="text"  id="product_name"  class="form-control" required>
                                          </div>
                                        </td>
                                        <td >
                                            <div class="form-group">
                                            <label for="code_referencia">Referencia</label>
                                            <input type="text"  id="code_referencia"  class="form-control" disabled>
                                          </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="stock">Stock</label>
                                                <input type="text"  id="stock"  class="form-control" disabled>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                    <label for="price">Precio </label>
                                                    <input type="text" class="form-control"  id="precio" disabled required>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="70px">
                                            <div class="form-group">
                                                <label for="">Cantidad</label>
                                                <input type="number" class="form-control"  id="cantidad" min="0" max="100" value="1" required>
                                            </div>
                                        </td>

                                        <td width="100px">
                                            <div class="form-group" >
                                                <label for="itbis">ITBIS </label>
                                                <select class="form-control"  id="itbis">
                                                    <option disabled>ITBIS</option>
                                                    <option value="18" selected>ITBIS (18 %)</option>
                                                    <option value="16">ITBIS (16 %)</option>
                                                    <option value="0">ITBIS (0 $)</option>
                                                  </select>        
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group" width="100px">
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
                                        </td>
                                        <td>

                                            
                                          
                                    </tr>
                                  
    
                                </tbody>
                                <tfoot>
                                    <tr>

                                        <th colspan="6">
                                            <div class="form-group" style="text-align: center">
                                                <button type="button"  id="agregarproducto" class="btn btn-primary float-center">Agregar producto</button>
                                            </div>
                                        </th>              
                                        
                                    
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>

                            
                  
                    
                    </div>

                  

                    
                    
                    
                    
                    <div class="form-group">
                        <h4 class="card-title">Detalles de venta</h4>
                        <div class="table-responsive">
                            <table id="detalles" class="table">
                                <thead>
                                    <tr>
                                        <th>Eliminar</th>
                                        <th>Producto</th>
                                        <th>Referencia</th>
                                        <th>Precio_de_Venta</th>
                                        <th>Descuento</th>
                                        <th>Cantidad</th>
                                        <th >ITBIS Impuesto</th>
                                        <th>Descuento</th>
                                        <th>SubTotal</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                      
                                          
                                    </tr>
                                   
                                <tfoot>
                                    <tr>
                                        <th colspan="2">
                                        
                                            <fieldset id="group2">
                                                <h5>Tipo de Pago</h5><br>
                                                

                                                <div>
                                                <input type="radio" value="Efectivo" name="group2">
                                                <label for="">Efectivo</label>

                                                </div>

                                                <div>
                                                <input type="radio" value="Transferencia" name="group2">
                                                <label for="">Transferencia</label>
                                                </div>

                                                <div>
                                                <input type="radio" value="Cheque" name="group2">
                                                <label for="">Cheque</label>
                                                </div>

                                                <div>
                                                <input type="radio" value="Tarjeta" name="group2">
                                                <label for="">Tarjeta de Credito</label>

                                                </div>

                                              </fieldset>
                                           
                                        </th>
                                         
                                    </tr>
                                    <tr>
                                        <th colspan="6">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right"><span id="total">DOP $ 0.00</span> </p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">
                                            <p align="right">TOTAL IMPUESTO:</p>
                                        </th>
                                        <th>
                                            <p align="right"><span id="total_impuesto">DOP $ 0.00</span></p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">
                                            <p align="right">TOTAL PAGAR:</p>
                                        </th>
                                        <th>
                                            <p align="right"><span align="right" id="total_pagar_html">DOP $  0.00</span> <input type="hidden"
                                                     id="total_pagar" name="monto"></p>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
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