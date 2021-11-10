
          <x-app-layout>
            <x-slot name="header">
            </x-slot> 
           
           <form action="{{ route('storeproducto')}}" method="POST" autocomplete="off">
                @csrf
            <div class="block" style="background: none">
            <div class="block-content" style="border-radius: 10px; padding: 5%; background: #10a9d3;">
            <h3 style="color: white; text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Nuevo Producto</h3>
            </br></br>
            <h5 style="color: white; margin-bottom: 3%">Informacion de Producto</h5>
            <div class="row">
                <div class="col">
                    <div class="form-group padding-top">
                        <input type="text" name="code" class="form-control oval" placeholder="Codigo"  required></input>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group padding-top">
                        <input type="text" name="descripcion" class="form-control oval" placeholder="Descripcion"  required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group padding-top">
                        <input class="form-control ovl" type="number" name="precio" placeholder="Precio de Venta"  required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group padding-top">
                        <input type="number" name="costo" class="form-control oval" placeholder="Costo"  required/>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="form-group padding-top">
                        <input type="text" name="stock" class="form-control oval" placeholder="Stock" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Stock'" required />
                    </div>
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