<x-app-layout>
    <x-slot name="header"></x-slot>

    
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
        
            
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    Nº Cotizacion : # {{$quotation->no_quote}}
                </small>
            </h1>
    
            <div class="page-tools">
                <div class="action-buttons">
                  
                    <a class="btn " href="{{ route('pdfquote', $quotation->id) }}" data-title="PDF">
                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                        PDF
                    </a>
                </div>
            </div>
        </div>
    
        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
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
                                <span class="text-600 text-110 text-blue align-middle">{{$quotation->client->name . " " . $quotation->client->lastname}}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    {{$quotation->client->address}}
                                </div>
                                <div class="my-1">
                                    <i class="fa fa-phone fa-flip-horizontal text-secondary"></i>  {{$quotation->client->phone}}
                                </div>
                                <span class="text-sm text-grey-m2 align-middle">Cedula o RNC:</span>
                                <span class="my-1"><i class="text-600 text-110 fa-flip-horizontal text-secondary align-middle"></i> <b class="">{{$quotation->client->cedula_rnc}}</b></span>
                            </div>
                        </div>
                        <!-- /.col -->
    
                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Factura
                                </div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Vendedor:</span> {{$quotation->user->name}}</div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Nº Cotizacion:</span> {{$quotation->no_quote}}</div>
    
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Fecha :</span> {{$quotation->fecha}}</div>
    
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-success badge-pill px-25">Facturado</span></div>
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
    
                        <tbody class="text-95 text-secondary-d3" style="height: 10px !important; overflow: scroll; ">
                            <tr></tr>
                      
                            @foreach($quoteDetails as $quoteDetail)
                            <tr>
                                
                                <td></td>
                                <td>{{$quoteDetail->product->descripcion}}</td>
                                <td>{{$quoteDetail->cantidad}}</td>
                                <td class="text-95">{{$quoteDetail->product->precio}}</td>
                                <td>{{$quoteDetail->descuento}}</td>
                                <td>{{$quoteDetail->prod_itbis}} %</td>
                                <td class="text-secondary-d2">{{$quoteDetail->total + ($quoteDetail->total * $quoteDetail->prod_itbis / 100)}}</td>
                            </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
    
    
                        <div class="row">
                            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                               
                            </div>
    
                            <div class="col-12 col-sm-5 text-90 order-first order-sm-last">
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        SubTotal:
                                    </div>
                                    <div class="col-5">
                                        <span class="text-120 text-secondary-d1">$ {{$subtotal}}</span>
                                    </div>
                                </div>
    
                                <div class="row my-2">
                                    <div class="col-7 text-right">
                                        ITBIS Total:
                                    </div>
                                    <div class="col-5">
                                        <span class="text-110 text-secondary-d1">$ {{$quotation->itbis}}</span>
                                    </div>
                                </div>
    
                                <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                    <div class="col-7 text-right">
                                       <h1>Total:</h1> 
                                    </div>
                                    <div class="col-5">
                                       <h1> <span class="text-success-d3 opacity-2">{{$quotation->monto}}</span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                      
    
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>


     