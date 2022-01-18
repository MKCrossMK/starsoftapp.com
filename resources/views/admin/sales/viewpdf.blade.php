
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <title>Factura</title>
    </head>
    <body>
   

    
        <style>
@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #57B223;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #57B223;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}




                </style>
                    

    <header class="clearfix">
        <div id="logo">
          <img src={{ asset('assets\images\logo\gtslogo.jpeg') }}">
        </div>
        <div id="company">
          <h2 class="name">Rudo Motors</h2>
          <div>Direccion....</div>
          <div>(800) 000-0000</div>
          <div>correo@gmail.com</div>
        </div>
        </div>
      </header>
      <main>
        <div id="details" class="clearfix">
          <div id="client">
            <div class="to">Factura a:</div>
            <h2 class="name">{{$sale->client->name . " " . $sale->client->lastname}}</h2>
            <div>{{$sale->client->cedula_rnc}}</div>
            <div class="address">{{$sale->client->address}}</div>
            <div class="email">{{$sale->client->phone}}</div>
          </div>
          <div id="invoice">
            <h1> Nº Factura >> # {{$sale->no_factura}}</h1>
            <div>Vendedor: {{$sale->user->name}}</div>
            <div class="date">Fecha: {{$sale->fecha}}</div>
            <div><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-success badge-pill px-25">Facturado</span></div>
          </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th class="no">#</th>
              <th class="desc">Descripcion</th>
              <th class="qty">Cantidad</th>
              <th class="unit">Precio</th>
              <th>Descuento</th>
              <th>ITBIS</th>
              <th class="total">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($saleDetails as $saleDetail)
            <tr style="text-align: right">
                <td class="no"></td>
                <td class="desc">{{$saleDetail->product->descripcion}}</td>
                <td style="text-align: center">{{$saleDetail->cantidad}}</td>
                <td class="text-95 unit">{{$saleDetail->product->precio}}</td>
                <td>{{$saleDetail->descuento}}</td>
                <td>{{$saleDetail->prod_itbis}} %</td>
                <td class="text-secondary-d2 total">{{number_format(($saleDetail->total + ($saleDetail->total * $saleDetail->prod_itbis / 100)), 2)}}</td>
            </tr> 
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td colspan="3">SUBTOTAL</td>
              <td>$ {{number_format($subtotal, 2)}}</td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td colspan="3">ITBIS 18%</td>
              <td>$ {{ number_format($sale->itbis, 2)}}</td>
            </tr>
            <tr>
              <td colspan="3"></td>
              <td colspan="3">TOTAL:</td>
              <td>$ {{ number_format($sale->monto, 2)}}</td>
            </tr>
          </tfoot>
        </table>
        <div id="thanks">Muchas Gracias!</div>
        <div id="notices">
            <div><span class="text-secondary-d1 text-105">Tipo Factura: {{$sale->tipo_factura}}</span></div>
            <div><span class="text-secondary-d1 text-105">Pago en: {{$sale->t_pago}}</span></div>
        </div>
      </main>
      <footer>
        La factura se creó en una computadora y es válida sin la firma y el sello.
      </footer>
    
     
</body>
</html>

     