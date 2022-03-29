
          <x-app-layout>
            <x-slot name="header">
            </x-slot> 
           
           <form action="{{ route('storecliente')}}" method="POST" autocomplete="off">
                @csrf
            <div class="block" style="background: none">
            <div class="block-content" style="border-radius: 10px; padding: 5%; background: #00b19d;">
            <h3 style="color: white; text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Nuevo Cliente</h3>
            </br></br>
            <h5 style="color: white; margin-bottom: 3%">Informacion de Cliente</h5>
             
      
            <div class="form-group">
                <input type="text" name="cedula_rnc" class="form-control" maxlength="11" placeholder="Cedula o RNC" onkeypress="return isNumber(event)" required>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Nombre"  required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="lastname" class="form-control" placeholder="Apellido"  required>
                </div>
              </div>

         

            <div class="form-group">
                <input type="text" name="company_name" class="form-control" placeholder="Nombre de negocio o compañia"  required />
            </div>

            <div class="form-group">
                <input type="text" name="address" class="form-control " placeholder="Direccion"  required/>
            </div>

            <div class="form-group">
                  <select class="form-control" name="province"  id="province">
                  <option disabled selected>Provincia</option>
                  @foreach ($provinces as $province)
                   <option  value="{{$province->f_descripcion}}">{{$province->f_descripcion}}</option>     
                  @endforeach
                 </select>      
            </div>
            
            <div class="form-group">
                <input class="form-control" type="text" name="phone" id="phone" placeholder="Telefono" maxlength="10" onkeypress="return isNumber(event)" required>
            </div>

            <div class="form-group">
                <input class="form-control phonehidden" type="text" name="second_phone" id="phone2" placeholder="Telefono" maxlength="10" onkeypress="return isNumber(event)" >
            </div>

            <div class="form-group"> 
                <input class="form-control phonehidden" type="text" name="third_phone" id="phone3" placeholder="Telefono" maxlength="10" onkeypress="return isNumber(event)" >
            </div>


            <div  style="display: flex; flex-direction: row; justify-content: center; margin-bottom: 10px">
                    <button type="button" class="btn-secondary" id="btnphone2" onclick="agregarTelefono()" style="margin-right: 10px">Agregar segundo telefono</button>
                    <button type="button" class="btn-secondary" id="btnphone3" onclick="agregarTelefonoT()">Agregar tercer telefono</button>
            </div>


            <div class="form-group">
                <input type="email" name="email" class="form-control oval" placeholder="Correo Electronico"  required />
            </div>

            <div class="form-group">
                <label for="tipo_comprobante" style="color: #fff; font-weight: bold">Tipo de Comprobante</label>
                  <select class="form-control" name="tipo_comprobante"  id="tipo_comprobante">
                  <option disabled>Tipo de Comprobante</option>
                  <option  value="{{$id_consumo}}">Factura de Consumo</option>     
                  <option value="{{$id_fiscal}}">Factura Valida Credito Fiscal</option>                     
                 </select>      
            </div>

            <div class="form-group">
                <label for="tipo_pago" style="color: #fff; font-weight: bold">Tipo de pago</label>
                  <select class="form-control" name="tipo_pago"  id="tipo_pago">
                  <option disabled>Tipo de Pago</option>
                  <option  value="Efectivo" >Efectivo</option>     
                  <option value="Transferencia">Transferencia</option>    
                  <option value="Cheque">Cheque</option>     
                  <option value="Tarjeta de Credito">Tarjeta de Credito</option>                      
                 </select>      
            </div>

            <div class="form-group">
                <label for="tipo_pago" style="color: #fff; font-weight: bold">Descuento</label>
                <input type="number" class="form-control prodItem formatProductInput" value="0" name="porciento_descuento" id="porciento_descuento" min="0" max="22" onkeyup="inputdescuento()" required>    
            </div>


            
            <div class="row padding-top" style="margin-top: 5%">
                <div class="col text-center">
                    <button type="submit" style=" background-color: white; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; width: 70%; color: #10a9d3" class="btn btn-hero btn-lg">
                        Crear
                    </button>
                </div>
            </div>
        </div>

</form>


</x-app-layout>