//  Buscar Clientes

var self = this;

$(document).ready(function() {
    buscarClientes();
    buscarProductos();
    evaluar();


});


function buscarClientes(){
    var options = {
        url: function(q) {
            return baseUrl('sale/findclient?q=' + q);
        },

          getValue: "cedula_rnc",
          list: {  
            onSelectItemEvent: function() {

                var selectedItemValue2 = $("#cedula_rnc").getSelectedItemData().name;
                document.getElementById("clientename").value = selectedItemValue2;

              var selectedItemValue = $("#cedula_rnc").getSelectedItemData().phone;
              document.getElementById("phone").value = selectedItemValue;

                     
              var selectedItemValue3 = $("#cedula_rnc").getSelectedItemData().id;
              document.getElementById("cliente_id").value = selectedItemValue3;

          

             

              $("#cedula_rnc").val($("#cedula_rnc").getSelectedItemData().cedula_rnc).trigger("change");
            }
          }
    };
        $("#cedula_rnc").easyAutocomplete(options); 
}

//Buscar Productos
function buscarProductos(){
    var options = {
        url: function(q) {
            return baseUrl('sale/findproduct?q=' + q);
        },

          getValue: "descripcion",
          list: {  
            onSelectItemEvent: function() {

              
              var selectedItemValue = $("#product_name").getSelectedItemData().precio;
              document.getElementById("precio").value = selectedItemValue;

              var selectedItemValue2 = $("#product_name").getSelectedItemData().stock;
              document.getElementById("stock").value = selectedItemValue2;
              
              var selectedItemValue3 = $("#product_name").getSelectedItemData().id;
              document.getElementById("product_id").value = selectedItemValue3;

              var selectedItemValue4 = $("#product_name").getSelectedItemData().code;
              document.getElementById("code_referencia").value = selectedItemValue4;


             

              $("#product_name").val($("#product_name").getSelectedItemData().descripcion).trigger("change");
            }
          }
    };
        $("#product_name").easyAutocomplete(options); 
}




/////////////////////////////////////
// Codigo detalles de factura

$(document).ready(function () {
    $("#agregarproducto").click(function () {
        agregar();
        evaluar();
    });
});

var cont = 1;
total = 0;
subtotal = [];
$("#guardar").hide();


var product_name = $('#product_name');
	




function agregar() {

    product_id = $("#product_id").val();
    product_name = $("#product_name").val();
    code = $("#code_referencia").val();
    quantity = $("#cantidad").val();
    discount = $("#descuento").val();
    price = $("#precio").val();
    stock = $("#stock").val();
    impuesto = $("#itbis").val();
  
    descuento = $('#descuento').val();
    if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
        if (parseInt(stock) >= parseInt(quantity)) {
            subtotal[cont] = (parseInt(quantity) *  parseInt(price) ) - (parseInt(discount) * parseInt(quantity) *  parseInt(price)  / 100 );
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' 
            + cont + ');"><i class="fa fa-times fa-2x"></i>X</button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">'
            + product_name + ' <input type="hidden" name="product_name[]" value="'+ product_name 
            + '">  <td> <input type="hidden" name="code_referencia[]" value="' + code + '"> <input class="form-control" type="text" name="code_referencia[]" value="'
            + code + '"disabled> </td> <td> <input type="hidden" name="precio[]" value="' + parseFloat(price).toFixed(2) 
            + '"> <input class="form-control" type="number" value="' + parseFloat(price).toFixed(2)
            + '" disabled> </td> <td> <input type="hidden" name="descuento[]" value="' + parseFloat(discount) 
            + '"> <input class="form-control" type="number" value="' + parseInt(discount) + '" disabled> </td> <td> <input type="hidden" name="cantidad[]" value="' 
            + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td> <td> <input type="hidden" id="prod_itbis" name="prod_itbis[]" value="' 
            + impuesto + '"> <input type="number" value="' + impuesto + '" class="form-control" disabled> </td> <td>  <input type="number" value="' + descuento 
            + '" class="form-control" disabled> </td>  <input type="hidden" name="total[]" value="' 
            +  parseFloat(subtotal[cont]).toFixed(2) + '"> <td align="right">DOP$' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {

          alert("La cantidad a vender supera el stock.")
            // Swal.fire({
            //     type: 'error',
            //     text: 'La cantidad a vender supera el stock.',
            // })
        }
    } else {
      alert("Rellene todos los campos del detalle de la venta.")
        // Swal.fire({
        //     type: 'error',
        //     text: 'Rellene todos los campos del detalle de la venta.',
        // })
    }
}
function limpiar() {
    $("#product_name").val("");
    $("#code_referencia").val("");
    $("#stock").val("");
    $("#precio").val("");
    $("#cantidad").val("1");
}
function totales() {
    $("#total").html("DOP" + "$" + " " + total.toFixed(2));

    //Calculo de itbis incorrecto
  

    
    

    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    $("#total_impuesto").html("DOP" + "$" + " " +  total_impuesto.toFixed(2));
    $("#total_pagar_html").html("DOP" + "$"  + " " +  total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
    $("#imp_itbis").val(total_impuesto.toFixed(2));
}
function evaluar() {
    if (total > 0) {
        $("#facturar").prop('disabled', false);
    } else {
        $("#facturar").prop('disabled', true);
    }
}
function eliminar(index) {
    total = total - subtotal[index];
    total_impuesto = total * impuesto / 100;
    total_pagar_html = total + total_impuesto;
    $("#total").html("DOP" + total);
    $("#total_impuesto").html("DOP" + total_impuesto);
    $("#total_pagar_html").html("DOP" + total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();
}

//Tipo de factura

jQuery(document).ready(function($) {
    // Change es un evento que se ejecuta cada vez que se cambia el valor de un elemento (input, select, etc).
    $('#tipo_factura').change(function(e) {

     var valf = $('#no_factura').val($('#tipo_factura option:selected').val());
     var textf = $('#tipo_factura option:selected').text();
     if (textf === "Factura Contado"){
        $('#documento').val("FC" + $('#no_factura').val());
        $('#tipo_fac').val("FC");
     }
      else  if (textf === "Factura Credito"){
        $('#documento').val("FCR" + $('#no_factura').val());
        $('#tipo_fac').val("FCR");
     }
 
    });
  });

  
//ncf

  const selectElement = document.querySelector('#tipo_ncf');

selectElement.addEventListener('change', (event) => {
   const seleccionado = event.target.value;

   //Factura consumo
   if (seleccionado === 'B02') {
    $("#sigConsumo").prop('disabled', false); 
    $('#ncf').val($('#tipo_ncf option:selected').val() + $('#sigConsumo').val() )
    $("#sigFiscal").prop('disabled', true);
   }
   // Factura fiscal
   else if (seleccionado === 'B01') {
    $("#sigFiscal").prop('disabled', false);
    $('#ncf').val($('#tipo_ncf option:selected').val() + $('#sigFiscal').val())
    $("#sigConsumo").prop('disabled', true);
    
    
   }
   else{
    $('#ncf').val('Nª de factura')
   }
});


//Banco cheque inpuet y select option

$(document).ready(function(){
    $("#banco_cheque").hide();
    $("#no_cheque").hide();

    $("#banco_cheque").prop('disabled', true);
    $("#no_cheque").prop('disabled', true);

    $('#tipo_pago').on('change',function(){
      if (this.value === "Cheque" ||  this.value === "Transferencia") {
        $("#banco_cheque").prop('disabled', false);
        $("#no_cheque").prop('disabled', false);
       
        $("#banco_cheque").show();
        $("#no_cheque").show();

      } else { 
        $("#banco_cheque").prop('disabled', true);
        $("#no_cheque").prop('disabled', true);
        $("#banco_cheque").hide();
        $("#no_cheque").hide();
      }  
    })
  });


  function myFunction() {
    var element = document.getElementById("sidebar");
    element.classList.remove("active");
  }


  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }
 