
          <x-app-layout>
            <x-slot name="header">
            </x-slot> 
           
           <form action="{{ route('storecliente')}}" method="POST" autocomplete="off">
                @csrf
            <div class="block" style="background: none">
            <div class="block-content" style="border-radius: 10px; padding: 5%; background: #10a9d3;">
            <h3 style="color: white; text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Nuevo Cliente</h3>
            </br></br>
            <h5 style="color: white; margin-bottom: 3%">Informacion de Cliente</h5>
            <div class="row">
             
                <div class="col">
                    <div class="form-group padding-top">
                        <input type="text" name="cedula_rnc" class="form-control oval" placeholder="Cedula o RNC" onkeypress="return isNumber(event)" required>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group padding-top">
                        <input type="text" name="name" class="form-control oval" placeholder="Nombre"  required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group padding-top">
                        <input type="text" name="lastname" class="form-control oval" placeholder="Apellido"  required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group padding-top">
                        <input class="form-control ovl" type="text" name="phone" id="phone" placeholder="Telefono" maxlength="10" onkeypress="return isNumber(event)" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group padding-top">
                        <input type="text" name="address" class="form-control oval" placeholder="Direccion"  required/>
                    </div>
                </div>
                
            </div>
    
            <div class="row">
                <div class="col">
                        <div class="form-group padding-top">
                            <input type="email" name="email" class="form-control oval" placeholder="Correo Electronico"  required />
                        </div>
                </div>
                <div class="col">
                    <label for="tipo_comprobante" style="color: black; font: bold">Tipo de Comprobante</label>
                      <select class="form-control" name="tipo_comprobante"  id="tipo_comprobante">
                      <option disabled>Tipo de Comprobante</option>
                      <option  value="{{$id_consumo}}">FACTURA DE CONSUMO</option>     
                      <option value="{{$id_fiscal}}">FACTURA VALIDA CREDITO FISCAL</option>                     
                     </select>      
                </div>
            </div>
            <div class="row" style="margin-top: 1%">
                <div class="col">
                </div>
                <div class="col">
                    <label for="tipo_pago" style="color: black; font: bold">Tipo de pago</label>
                      <select class="form-control" name="tipo_pago"  id="tipo_pago">
                      <option disabled>Tipo de Pago</option>
                      <option  value="Efectivo" >Efectivo</option>     
                      <option value="Transferencia">Transferencia</option>    
                      <option value="Cheque">Cheque</option>     
                      <option value="Tarjeta de Credito">Tarjeta de Credito</option>                      
                     </select>      
                </div>
            </div>
            
            <div class="row padding-top" style="margin-top: 10%">
                <div class="col text-center">
                    <button type="submit" style=" background-color: white; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; width: 70%; color: #10a9d3" class="btn btn-hero btn-lg">
                        Crear
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>

</x-app-layout>