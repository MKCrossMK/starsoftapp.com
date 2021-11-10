<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

  



    <div class="container" id="advanced-search-form">
        <h2 style="text-align: center">Nueva Facturacion</h2>

     
        <form>

            <div class="row justify-content-between text-left">
                <div class="form-group col-sm-2 flex-column d-flex">
            
                <a class="btn btn-info"  style="color: black;" href="https://www.google.es" >Lista de ventas</a>
            </div>



                 <div class="form-group col-sm-5 flex-column d-flex"> 

                    <div class="col" style="margin-bottom: 1%">
                        <div class="row">
                            <div class="col-3">
                                <h1 class="col-sm-6 col-form-label><label for="ncf">NCF:</h1>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="NCF" name="ncf"  id="ncf" readonly>
                            </div>
                          </div>
                        </div>


                    {{-- <div class="col" style="margin-bottom: 1%">
                        <div class="row">
                            <div class="col-2">
                                <label for="clientename" class="col-sm-6 col-form-label" >Cliente</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="clientname" placeholder="Cliente" id="clientename">
                            </div>
                        </div>
                    </div>

                     --}}
                
                   
            
                </div>
            

            


            <div class="row justify-content-between text-left" style="margin-top: 5%" >
                <div class="form-group col-sm-6 flex-column d-flex">

                      <div class="col" style="margin-bottom: 1%">
                        <div class="row">
                            <div class="col-2">
                                <label for="cedula_rnc" class="col-sm-6 col-form-label">Cedula </label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="cedula_rnc" placeholder="Cedula o RNC" id="cedula_rnc">
                            </div>
                          </div>
                        </div>


                    <div class="col" style="margin-bottom: 1%">
                        <div class="row">
                            <div class="col-2">
                                <label for="clientename" class="col-sm-6 col-form-label" >Cliente</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="clientname" placeholder="Cliente" id="clientename">
                            </div>
                        </div>
                    </div>

                    
                    <div class="col" style="margin-bottom: 1%">
                        <div class="row">
                            <div class="col-2">
                                <label for="phone" class="col-sm-6 col-form-label" >Telefono</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="phone" placeholder="Telefono" id="phone">
                            </div>
                        </div>
                    </div>

                  
               
            </div>

                 <div class="form-group col-sm-6 flex-column d-flex"> 

                    <div class="col" style="margin-bottom: 1%">
                        <div class="row">
                            <div class="col-2">
                                <label for="fecha" class="col-sm-6 col-form-label">Fecha</label>
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control" name="fecha"  id="fecha">
                            </div>
                          </div>
                        </div>


                    <div class="col" style="margin-bottom: 1%">
                        <div class="row">
                            <div class="col-2">
                                <label for="clientename" class="col-sm-6 col-form-label" >Cliente</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="clientname" placeholder="Cliente" id="clientename">
                            </div>
                        </div>
                    </div>

                    
                    <div class="col" style="margin-bottom: 1%">
                        <div class="row">
                            <div class="col-2">
                                <label for="phone" class="col-sm-6 col-form-label" >Telefono</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="phone" placeholder="Telefono" id="phone">
                            </div>
                        </div>
                    </div>

                   
            
                </div>
            

            
              <div class="form-row">
                <div class="form-group col-md-4">
                    <div class="form-group">
                        <label for="product_id">Producto</label>
                        {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
                        <select class="form-control" name="product_id" id="product_id">
                            <option value="" disabled selected>Selecccione un producto</option>
                            {{-- @foreach ($products as $product)
                            <option value="{{$product->id}}_{{$product->stock}}_{{$product->precio}}">{{$product->descripcion}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-group">
                        <label for="">Stock actual</label>
                        <input type="text" name="stock" id="stock" value="" class="form-control" disabled>
                      </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="form-group">
                        <label for="price">Precio de venta</label>
                        <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId" disabled>
                    </div>
                </div>
              </div>
            
            
              <div class="form-row">
                <div class="form-group col-md-2">
                    <div class="form-group">
                        <label for="quantity">Cantidad</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="tax">Impuesto</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">%</span>
                        </div>
                        <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3" value="18">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="discount">Porcentaje de descuento</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                        <input type="number" class="form-control" name="discount" id="discount" aria-describedby="basic-addon2" value="0">
                    </div>
                </div>
              </div>
            
            
            
            
            
            
            
            <div class="form-group">
                <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
            </div>
            <div class="form-group">
                <h4 class="card-title">Detalles de venta</h4>
                <div class="table-responsive col-md-12">
                    <table id="detalles" class="table">
                        <thead>
                            <tr>
                                <th>Eliminar</th>
                                <th>Producto</th>
                                <th>Precio Venta (PEN)</th>
                                <th>Descuento</th>
                                <th>Cantidad</th>
                                <th>SubTotal (PEN)</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            {{-- @if(!empty($client))
                            @foreach($client as $cli) --}}
                            <tr>
                                <td>Icono</td>
                                <td>X</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                  
                            </tr>
                            {{-- @endforeach
                            @else

                            <h1 style="text-align: center">No hay datos</h1>

                                
                            @endif --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="right"><span id="total">PEN 0.00</span> </p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="5">
                                    <p align="right">TOTAL IMPUESTO (18%):</p>
                                </th>
                                <th>
                                    <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="5">
                                    <p align="right">TOTAL PAGAR:</p>
                                </th>
                                <th>
                                    <p align="right"><span align="right" id="total_pagar_html">PEN 0.00</span> <input type="hidden"
                                             id="total_pagar"></p>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

        </form>
    </div>
    <script src="{{ asset('bower_components\jquery\dist\jquery.min.js') }}"></script>


    <script src="{{ asset('js\codigo.js') }}"></script>

    <script src="{{ asset('/plugins\easyAutocomplete-1.3.5\jquery.easy-autocomplete.min.js') }}"></script>




   


    
</body>
</html>