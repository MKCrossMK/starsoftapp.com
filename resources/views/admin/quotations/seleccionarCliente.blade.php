<button type="button" onclick="selecionarCliente(this);" 
data-id="{{ $clie->id }}" 
data-apellidos="{{ $clie->lastname }}"
data-nombres="{{ $clie->name }}"
data-identificacion="{{ $clie->cedula_rnc }}"
data-telefono="{{ $clie->phone }}"
data-direccion="{{ $clie->address }}"
 class="btn btn-elegant btn-sm" data-toggle="tooltip" data-placement="top" title="Selecionar cliente">
    <i class="fas fa-file-export fa-2x"></i>
</button>