<x-app-layout>
    <x-slot name="header">
    </x-slot>

            <form action="{{ route('updatecliente', $client->id) }}" method="POST" autocomplete="off">
                @csrf
                @method('PATCH')
    

                    <div class="block" style="background: none">
                        <div class="block-content" style="border-radius: 10px; padding: 5%; background: #00b19d;">
                        <h3 style="color: white; text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Editar Cliente</h3>
                        </br></br>
                        <h5 style="color: white; margin-bottom: 3%">Informacion de Cliente</h5>
                         
                  
                        <div class="form-group">
                            <input type="text" name="cedula_rnc" class="form-control" maxlength="11" placeholder="Cedula o RNC" value="{{$client->cedula_rnc}}"  onkeypress="return isNumber(event)" required>
                        </div>
            
            
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Nombre"  value="{{$client->name}}"  required>
                            </div>
                            <div class="form-group col-md-6"> 
                                <input type="text" name="lastname" class="form-control" placeholder="Apellido" value="{{$client->lastname}}"  required>
                            </div>
                          </div>
            
                     
            
                        <div class="form-group">
                            <input type="text" name="company_name" class="form-control" placeholder="Nombre de negocio o compañia" value="{{$client->company_name}}"   required />
                        </div>
            
                        <div class="form-group">
                            <input type="text" name="address" class="form-control " placeholder="Direccion" value="{{$client->address}}"  required/>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="province"  id="province">
                            <option disabled selected>Provincia</option>
                            @foreach ($provinces as $province)
                             <option  value="{{$province->id}}" {{$client->province ===  $province->id ? 'selected' : ''}}>{{$province->descripcion}}</option>     
                            @endforeach
                           </select>      
                        </div>
            
                        
                        <div class="form-group">
                            <input class="form-control" type="text" name="phone" id="editphone" placeholder="No contiene Numero Principal" value="{{$client->phone}}" maxlength="10" onkeypress="return isNumber(event)" required>
                        </div>
            
                        <div class="form-group">
                            <input class="form-control" type="text" name="second_phone" id="editphone2" placeholder="No contiene Segundo Telefono" value="{{$client->second_phone}}" maxlength="10" onkeypress="return isNumber(event)" >
                        </div>
            
                        <div class="form-group"> 
                            <input class="form-control " type="text" name="third_phone" id="editphone3" placeholder="No contiene Tercer Telefono" value="{{$client->third_phone}}" maxlength="10" onkeypress="return isNumber(event)" >
                        </div>
            
            
            
                        <div class="form-group">
                            <input type="email" name="email" class="form-control oval" placeholder="Correo Electronico" value="{{$client->email}}"   required />
                        </div>
            
                        <div class="form-group">
                            <label for="tipo_comprobante" style="color: #fff; font-weight: bold">Tipo de Comprobante</label>
                            <select class="form-control" name="tipo_comprobante"  id="tipo_comprobante">
                                <option disabled>Tipo de Comprobante</option>
                                <option value="{{$id_consumo}}" {{$client->tipo_comprobante === $id_consumo ? 'selected' : ''}}>FACTURA DE CONSUMO</option>     
                                <option value="{{$id_fiscal}}" {{$client->tipo_comprobante === $id_fiscal ? 'selected' : ''}} >FACTURA VALIDA CREDITO FISCAL</option>                     
                               </select>   
                        </div>
            
                        <div class="form-group">
                            <label for="tipo_pago" style="color: #fff; font-weight: bold">Tipo de pago</label>
                            <select class="form-control" name="tipo_pago"  id="tipo_pago">
                                <option disabled>Tipo de Pago</option>
                                <option value="Efectivo" {{$client->tipo_pago === "Efectivo" ? 'selected' : ''}}>Efectivo</option>     
                                <option value="Transferencia" {{$client->tipo_pago === "Transferencia" ? 'selected' : ''}}>Transferencia</option>    
                                <option value="Cheque" {{$client->tipo_pago === "Cheque" ? 'selected' : ''}}>Cheque</option>     
                                <option value="Tarjeta de Credito" {{$client->tipo_pago === "Tarjeta de Credito" ? 'selected' : ''}}>Tarjeta de Credito</option>                      
                               </select>      
                        </div>
            
                        <div class="form-group">
                            <label for="tipo_pago" style="color: #fff; font-weight: bold">Descuento</label>
                            <input type="number" class="form-control prodItem formatProductInput" value="{{$client->porciento_descuento}}" name="porciento_descuento" id="porciento_descuento" min="0" max="22" onkeyup="inputdescuento()" required>    
                        </div>

              
                    
                    <div class="row padding-top" style="margin-top: 10%">
                        <div class="col text-center">
                            <button type="submit" style=" background-color: white; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; width: 70%; color: #10a9d3" class="btn btn-hero btn-lg">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
        </div>
        
        </x-app-layout>