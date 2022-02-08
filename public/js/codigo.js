
$(document).ready(function(){

 

  $('#agregarproducto').click(function(){
    product_id = $("#product_id").val();
    product_name = $("#product_name").val();
    code = $("#code_referencia").val();
    quantity = $("#cantidad").val();
    discount = $("#descuento").val();
    price = $("#precio").val();
    stock = $("#stock").val();
    impuesto = $("#itbis").val();

  
    if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
        // if (parseInt(stock) >= parseInt(quantity)) {
  $('.item-row:last').after('<tr class="item-row"><td style="padding:0px;"><button class="btn btn-danger delete">-</button></td><td><div class="form-row"><div class="col"> <input type="hidden" name="product_id[]" value="' + product_id + '">' + '<input type="hidden" class="itemstock" id="itemstock" value="' + stock + '">' 
          + '<textarea cols="14" rows="2" style="resize: none; font-weight: bold; border: 0px; background-color: white" disabled>' + product_name + '</textarea>'+ '<input type="hidden" name="product_name[]" value="' + product_name 
          + '"></div><span style="font-size: 25px; margin: 0px auto;">(</span><div class="col"><input type="hidden" name="code_referencia[]" value="' + code
          + '"> <input class="form-control" type="text" name="code_referencia[]" value="'+ code + '" style="text-align: center; border: 0px;background-color: white" disabled></div><span style="font-size: 25px; margin: 0px auto">)</span></div>'
          + '<div class="form-row"><div class="col" style="display: flex"><input type="hidden" class="qtyhidden" id="qtyhidden" name="cantidad[]" value="'+ quantity + '"> <input type="tel" value="' + quantity
          + '" class="form-control qtyshow" style="width: 50px;border: 0px; text-align: center;background-color: white" id="qtyshow" required><span style="padding: 1%; margin: 0% auto;font-size: 20px;  ">x </span><input type="hidden" id="pricehidden" name="precio[]" value="' + parseFloat(price).toFixed(2) 
          + '"> <input class="form-control priceshow" type="text" id="priceshow" value="' + parseFloat(price).toFixed(2) + '" style="border: 0px;background-color: white" disabled></div><div class="col" style="display: flex; align-items: center; justify-content: center;">' 
          + '<span>ITBIS </span><input type="hidden" class="prod_itbis" id="prod_itbis" name="prod_itbis[]" value="' + impuesto + '"> <input type="text" value="' + impuesto + '" class="form-control" style="border: 0px; text-align: center;background-color: white" disabled>%</div></div>'
          + '<div class="form-row" style="display: flex;"><div class="col" style="display: flex; align-items: center; justify-content: center;"><span>DESC </span> ' 
          + ' <input type="hidden" class="discounthidden" name="descuento[]" value="' + parseFloat(discount) + '"> <input class="form-control discountshow" type="tel" value="' + parseInt(discount) + '" style="border: 0px; text-align: center;width: 50px;background-color:white;" required> % </div>'
          + '<div class="col" style="display: flex; align-items: center; justify-content: center;font-weight: bold;background-color: aliceblue"><span>RD$</span>'
          + '<input type="hidden" class="totalhidden" name="total[]"><input type="tel" id="totalshow" class="form-control totalshow"  style="border: 0px; text-align: center;background-color: aliceblue" readonly></div></div></td></tr>');
  bind();
  cancelarTableProductos();
  cancelarTab_Productos();

//    else {

//             alert("La cantidad a vender supera el stock.")
//               // Swal.fire({
//               //     type: 'error',
//               //     text: 'La cantidad a vender supera el stock.',
//               // })
//           }
      } else {
        alert("Rellene todos los campos del detalle de la venta.")
          // Swal.fire({
          //     type: 'error',
          //     text: 'Rellene todos los campos del detalle de la venta.',
          // })
      }

})
bind();

 function bind(){
  $('.priceshow').keyup(update_price);

  $('.qtyshow').keyup(update_price);
  
  $('.discountshow').keyup(update_price);

  $('.priceshow').trigger('keyup', update_price);

  $('.qtyshow').trigger('keyup', update_price);

  $('.discountshow').trigger('keyup', update_price);
  }


function  update_price(){
  var row =  $(this).parents('.item-row');

  var stock = row.find('.itemstock').val();
  var cost =  row.find('.priceshow').val();
  var qty =  row.find('.qtyshow').val();
  var desc = row.find('.discountshow').val();


  if(row.find('.discountshow').val() > 22 ){
    row.find('.discountshow').val(22);
  }

  console.log(qty ,stock);

  row.find('.discounthidden').val(row.find('.discountshow').val());
  row.find('.pricehidden').val(row.find('.priceshow').val());
  row.find('.qtyhidden').val(row.find('.qtyshow').val()) ;

  var total_precio = qty * cost - ((qty * cost) * ( desc /100));

  var impu = total_precio / (1 + 18 / 100);

  var  total_impuesto = impu * (18 / 100);

  console.log(total_impuesto.toFixed(2));

  row.find('.impuesto').html(total_impuesto.toFixed(2));

  row.find('.totalshow').val(total_precio);
  row.find('.totalhidden').val(total_precio);

  update_total();

  }


function update_total(){

  var total = 0 ; 
  var tax = 0;
  $('.totalshow').each(function(i){
    price =  $(this).val();
      if(price > 0){
        total += Number(price);
      }
  });
  total_imp = total / (1 + 18 / 100);
  total_impuesto = total_imp * (18 / 100)

 

    $("#total").html("DOP" + "$" + " " + total.toFixed(2));
    $("#total_impuesto").html("DOP" + "$" + " " +  total_impuesto.toFixed(2));
    $("#total_pagar_html").html("DOP" + "$"  + " " +  total.toFixed(2));
    $("#total_pagar").val(total.toFixed(2));
    $("#imp_itbis").val(total_impuesto.toFixed(2));
}

$(document.body).on('click', '.delete' ,function(){
    $(this).parents('.item-row').remove();
    update_total() ;
    
  })

})

function limpiar() {
    $("#product_name").val("");
    $("#code_referencia").val("");
    $("#stock").val("");
    $("#precio").val("");
    $("#cantidad").val("1");
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
  

  function tableProductos() {
    var element = document.getElementById("table-productos");
    element.classList.remove("hidden");
    element.classList.add("productos-visibles");
    window.scroll(0, 0);

  } 

  function tab_Producto() {
    var element = document.getElementById("proditem_facturar");
    element.classList.remove("hidden");
    element.classList.add("productos-visibles");
    window.scroll(0, 0);
  } 


  
  function cancelarTableProductos() {
    var element = document.getElementById("table-productos");
    element.classList.remove("productos-visibles");
    element.classList.add("hidden");
  } 

  function cancelarTab_Productos() {
    var element = document.getElementById("proditem_facturar");
    element.classList.remove("productos-visibles");
    element.classList.add("hidden");
    limpiar();
  } 

  function tableClients() {
    var element = document.getElementById("cliente_facturar");
    element.classList.remove("hidden");
    element.classList.add("productos-visibles");
    window.scroll(0, 0);

  } 

  function cancelarTab_Clients() {
    var element = document.getElementById("cliente_facturar");
    element.classList.remove("productos-visibles");
    element.classList.add("hidden");
  } 


  function moverseA(idDelElemento) {
    location.hash = "#" + idDelElemento;
  }


  function producto_facturar(prod_id){

  
  document.getElementById('product_id').value = document.getElementById('productItem_id' + prod_id).value;
  document.getElementById('product_name').value = document.getElementById('productItem_desc' + prod_id).value;
  document.getElementById('code_referencia').value = document.getElementById('productItem_code' + prod_id).value;
  document.getElementById('stock').value = document.getElementById('productItem_stock' + prod_id ).value;
  document.getElementById('precio').value = document.getElementById('productItem_precio' + prod_id).value;
  tab_Producto();

  }

  function cliente_facturar(client_id){

    document.getElementById('cliente_id').value = document.getElementById('clientItem_id' + client_id).value;
    document.getElementById('clientename').value = document.getElementById('clientItem_name' + client_id).value;
    document.getElementById('cedula_rnc').value = document.getElementById('clientItem_cedrnc' + client_id).value;
    document.getElementById('descuento').value = document.getElementById('clientItem_desc' + client_id).value;
    cancelarTab_Clients();
    }

  function agregarTelefono(){
    $('#phone2').toggleClass("phonehidden");

    var x = document.getElementById("btnphone2");
    if (x.innerHTML === "Agregar segundo telefono") {
      x.innerHTML = "Eliminar segundo telefono";
      document.getElementById('phone2').value = '';
    } else {
      x.innerHTML = "Agregar segundo telefono";
      document.getElementById('phone2').value = '';
    }
  }
  
  function agregarTelefonoT(){
    $('#phone3').toggleClass("phonehidden");

    var x = document.getElementById("btnphone3");
    if (x.innerHTML === "Agregar tercer telefono") {
      x.innerHTML = "Eliminar tercer telefono";
      document.getElementById('phone3').value = '';
    } else {
      x.innerHTML = "Agregar tercer telefono";
      document.getElementById('phone3').value = '';
    }
  }

  function inputdescuento(){
    if (document.getElementById('porciento_descuento').value > 22){
      document.getElementById('porciento_descuento').value = 22
    }
  }
 



