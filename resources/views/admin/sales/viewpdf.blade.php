
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <title>Document</title>
    </head>
    <body>
   

    
        <style>

            body{
                margin-top:20px;
                color: #484b51;
            }
            .text-secondary-d1 {
                color: #728299!important;
            }
            .page-header {
                margin: 0 0 1rem;
                padding-bottom: 1rem;
                padding-top: .5rem;
                border-bottom: 1px dotted #e2e2e2;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -ms-flex-align: center;
                align-items: center;
            }
            .page-title {
                padding: 0;
                margin: 0;
                font-size: 1.75rem;
                font-weight: 300;
            }
            .brc-default-l1 {
                border-color: #dce9f0!important;
            }
            
            .ml-n1, .mx-n1 {
                margin-left: -.25rem!important;
            }
            .mr-n1, .mx-n1 {
                margin-right: -.25rem!important;
            }
            .mb-4, .my-4 {
                margin-bottom: 1.5rem!important;
            }
            .total{
                font-size: 24px;
            }
            
            hr {
                margin-top: 1rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px solid rgba(0,0,0,.1);
            }
            
            .text-grey-m2 {
                color: #888a8d!important;
            }
            
            .text-success-m2 {
                color: #86bd68!important;
            }
            
            .font-bolder, .text-600 {
                font-weight: 600!important;
            }
            
            .text-110 {
                font-size: 110%!important;
            }
            .text-blue {
                color: #478fcc!important;
            }
            .pb-25, .py-25 {
                padding-bottom: .75rem!important;
            }
            
            .pt-25, .py-25 {
                padding-top: .75rem!important;
            }
            .bgc-default-tp1 {
                background-color: rgba(43, 155, 220, 0.92)!important;
            }
            .bgc-default-l4, .bgc-h-default-l4:hover {
                background-color: #f3f8fa!important;
            }
            .page-header .page-tools {
                -ms-flex-item-align: end;
                align-self: flex-end;
            }
            
            .btn-light {
                color: #757984;
                background-color: #f5f6f9;
                border-color: #dddfe4;
            }
            .w-2 {
                width: 1rem;
            }
            
            .text-120 {
                font-size: 120%!important;
            }
            .text-primary-m1 {
                color: #4087d4!important;
            }
            
            .text-danger-m1 {
                color: #dd4949!important;
            }
            .text-blue-m2 {
                color: #68a3d5!important;
            }
            .text-150 {
                font-size: 150%!important;
            }
            .text-60 {
                font-size: 60%!important;
            }
            .text-grey-m1 {
                color: #7b7d81!important;
            }
            .align-bottom {
                vertical-align: bottom!important;
            }
            
            
                </style>
                    
 
                    

    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                <small class="page-info">
                    >> 
                    Nº Factura : # {{$sale->no_factura}}
                </small>
            </h1>
    
            <div class="page-tools">
                <div class="action-buttons">
                   
            </div>
        </div>
    
  
        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <br><br>
                                <span class="text-default-d3">GTS</span>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
    
                    <hr class="row brc-default-l1 mx-n1 mb-4" />
    
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">A:</span>
                                <span class="text-600 text-110 text-blue align-middle">{{$sale->client->name . " " . $sale->client->lastname}}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    {{$sale->client->address}}
                                </div>
                                <div class="my-1">
                                    <i class="fa fa-phone fa-flip-horizontal text-secondary"></i>  {{$sale->client->phone}}
                                </div>
                                <span class="text-sm text-grey-m2 align-middle">RNC:</span>
                                <span class="my-1"><i class="text-600 text-110 fa-flip-horizontal text-secondary align-middle"></i> <b class="">{{$sale->client->cedula_rnc}}</b></span>
                            </div>
                        </div>
                        <!-- /.col -->
    
                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                            

                                <div class="my-2">
                                    <table>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th><th></th><th></th><th></th><th>
</th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th></th><th></th><th>
</th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th>  
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th></th></th><th></th></th><th><th></th><th></th><th></th><th>                                            
                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Fecha :</span> {{$sale->user->name}}
                                    </th>
                                </table>
                                </div>
    
                                <div class="my-2">
                                    <table>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th><th></th><th></th><th></th><th>
</th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th></th><th></th><th>
</th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th>  
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th></th></th><th></th></th><th><th></th><th></th><th></th><th>                                            
                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Fecha :</span> {{$sale->fecha}}
                                    </th>
                                </table>
                                </div>
    
                                <div class="my-2">
                                    <table>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th><th></th><th></th><th></th><th>
</th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th></th><th></th><th>
</th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th>  
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th></th></th><th></th></th><th><th></th><th></th><th></th><th>       
                                     <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-success badge-pill px-25">Facturado</span>
                                        </th>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
    
    
                    
                <div class="table-responsive">
                    <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                        <thead class="bg-none bgc-default-tp1">
                            <tr class="text-white">
                                <th class="opacity-2">#</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Descuento</th>
                                <th>ITBIS</th>
                                <th width="140">SubTotal</th>
                            </tr>
                        </thead>
                    <br>
                    <br>
    
                        <tbody class="text-95 text-secondary-d3" style="height: 10px !important; overflow: scroll; ">
                            
                      
                            @foreach($saleDetails as $saleDetail)
                            <tr>
                                <td></td>
                                <td>{{$saleDetail->product->descripcion}}</td>
                                <td>{{$saleDetail->cantidad}}</td>
                                <td class="text-95">{{$saleDetail->product->precio}}</td>
                                <td>{{$saleDetail->descuento}}</td>
                                <td>{{$saleDetail->prod_itbis}} %</td>
                                <td class="text-secondary-d2">{{$saleDetail->total + ($saleDetail->total * $saleDetail->prod_itbis / 100)}}</td>
                            </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
    

                <table>
            
                </table>
    
                        <div class="row">
                          
                            <div class="col-12 col-sm-5 text-90 order-first order-sm-last">
                                <div class="row my-2">
                                    <div >
                                        <table>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th><th></th><th></th><th></th><th>
</th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th></th><th></th><th>
</th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th>  
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th>
    <th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th>                                       
         <span class="col-7 text-right"> SubTotal:</span> <span class="text-120 text-secondary-d1">$ {{$subtotal}}</span>
                                            </th>
                                        </table>

                                    </div>
                                   
                                </div>
    
                                <div class="row my-2">
                                    <div >
                                        <table>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th><th></th><th></th><th></th><th>
</th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th></th><th></th><th>
</th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th>  
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th>   
                <span class="col-7 text-right"> ITBIS Total: </span> <span class="text-110 text-secondary-d1">$ {{$sale->itbis}}</span>
                </th>

                                        </table>
                                    </div>
                                
                                </div>
    
                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                    <div class="col-7 text-right">
                                        <table>
<th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th>
<th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th></th><th></th><th>
</th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th></th><th></th><th></th><th><th>
     
                                        <span class="total">Total: <span class="text-success-d3 opacity-2">{{$sale->monto}}</span></span>
                                        </th>
                                        </table>
                                    
                                    </div>
                               
                                </div>
                            </div>
                        </div>
    
                      
    <br><br><br>
                        <div>
                            <span class="text-secondary-d1 text-105">Tipo Factura: {{$sale->tipo_factura}}</span>
                            <br>
                            <span class="text-secondary-d1 text-105">Pago en: {{$sale->t_pago}}</span>
                          
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     
</body>
</html>

     