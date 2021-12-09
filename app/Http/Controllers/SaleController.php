<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreRequest;
use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Barryvdh\DomPDF\Facade as PDF;


class SaleController extends Controller
{
    private $buscaCliente = null;

    public function __construct()
    {
        $this->buscaCliente = new Client();
        $this->buscaProducto= new Product();
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        if (Auth::user()->name === 'admin'){
            $sales = Sale::all();
        }
        else
        {
            $userid = Auth::user()->id;
            $sales = Sale::all()->where('user_id', $userid);
        }

     
     
        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dt = Carbon::now('America/Santo_Domingo')->format('Y-m-d');

        
        //Bancos 
        $bancos = DB::table('t_bancos')->get(); 
  


        //tipo factura
       
        $fc = DB::table('t_secuencias')->select('f_secuencia')->where('f_id', 1)->first()->f_secuencia;
        $fcr = DB::table('t_secuencias')->select('f_secuencia')->where('f_id', 2)->first()->f_secuencia;

        //ncf

        $consumo = DB::table('t_ncf')->select('f_tipo')->where('f_codigo', 1)->first()->f_tipo;
        $fiscal = DB::table('t_ncf')->select('f_tipo')->where('f_codigo', 2)->first()->f_tipo;

        
        $sigConsumo = DB::table('t_ncf')->select('f_siguiente_ncf')->where('f_codigo', 1)->first()->f_siguiente_ncf;
        $sigFiscal = DB::table('t_ncf')->select('f_siguiente_ncf')->where('f_codigo', 2)->first()->f_siguiente_ncf;



        return view('admin.sales.create', compact('dt', 'fc', 'fcr', 'consumo', 'fiscal', 'sigConsumo', 'sigFiscal', 'bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::user()->id;

        
        for($i = 0; $i < count($request['product_id']); $i++){
           $d[] = $request['precio'][$i] * $request['descuento'][$i]  / 100;      
        }

        $total_descuento = array_sum($d);


       $Sale = Sale::create([
            'user_id' => Auth::id(),
            'tipo_factura' => $request->input('tipo_fac'),
            'no_factura' => $request->input('no_factura'),
            'documento' => $request->input('documento'),
            'fecha' => $request->input('fecha'),
            'monto' => $request->input('monto'),
            'itbis' => $request->input('imp_itbis'),
            'descuento' => $total_descuento,
            't_pago' => $request->tipo_pago,
            'no_cheque' => $request->input('no_cheque'),
            'banco_cheque' => $request->banco_cheque,
            't_cobro' => 'Efectivo',
            'client_id' => $request->input('client_id'),
            'tipo_ncf' => $request->tipo_ncf,
            'ncf' => $request->input('ncf'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $lastsale = $this->lastsale();
        
        for($i = 0; $i < count($request['product_id']); $i++){
            $data[] = array(
            'sale_id'=> $lastsale, 
            'tipo_factura' => $request->input('tipo_fac'),
            'no_factura' => $request->input('no_factura'),
            'documento' => $request->input('documento'),
            'fecha' => $request->input('fecha'),
            'product_id' => $request['product_id'][$i], 
            'cantidad' => $request['cantidad'][$i], 
            'precio' => $request['precio'][$i], 
            'prod_itbis' => $request['prod_itbis'][$i],
            'total' => $request['total'][$i],
            'descuento' => $request['precio'][$i] * $request['descuento'][$i] / 100
        );



        }
        // Factura incrementar
        
        $fc = DB::table('t_secuencias')->select('f_secuencia')->where('f_id', 1)->first()->f_secuencia;
        $fcr = DB::table('t_secuencias')->select('f_secuencia')->where('f_id', 2)->first()->f_secuencia;


        if($request->input('tipo_fac') === "FC"){

        DB::table('t_secuencias')->where('f_id', 1)->update(array(
            'f_secuencia'=>  $fc + 1));
         }
        elseif ($request->input('tipo_fac') === "FCR"){
         DB::table('t_secuencias')->where('f_id', 2)->update(array(
            'f_secuencia'=>  $fcr + 1));
        }

        //ncf incrementar
        
        $sigConsumo = DB::table('t_ncf')->select('f_siguiente_ncf')->where('f_codigo', 1)->first()->f_siguiente_ncf;
        $sigFiscal = DB::table('t_ncf')->select('f_siguiente_ncf')->where('f_codigo', 2)->first()->f_siguiente_ncf;
 
        if($request->tipo_ncf === "B02"){
            DB::table('t_ncf')->where('f_codigo', 1)->update(array(
                'f_siguiente_ncf'=>  $sigConsumo + 00000001));
        }
        elseif($request->tipo_ncf === "B01"){
            DB::table('t_ncf')->where('f_codigo', 2)->update(array(
                'f_siguiente_ncf'=>  $sigFiscal + 00000001));
        }

    
        
      
    

        $Sale->saleDetail()->createMany($data);

        return redirect()->route('indexsale');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    
    {

        $subtotal = 0;
        $saleDetails = $sale->saleDetail;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->cantidad * $saleDetail->precio - $saleDetail->descuento;
        }
        return view('admin.sales.show', compact('sale', 'saleDetails', 'subtotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $clients = Client::all();
        return view('admin.sale.show', compact('clients', 'sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function findclient(Request $request){
     
        
        return $this->buscaCliente
                          ->findbyname($request->input('q'));

    }
    public function findproduct(Request $request){
     
        
        return $this->buscaProducto
                          ->findbyname($request->input('q'));

    }

    public function lastsale(){
        return Sale::latest('id')->first();
    
    }

    public function pdf(Sale $sale)
    
    {

        $subtotal = 0;
        $saleDetails = $sale->saleDetail;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->cantidad * $saleDetail->precio - $saleDetail->descuento;
        }

        $pdf = PDF::loadView('admin.sales.viewpdf', compact('sale', 'saleDetails', 'subtotal'))->setOptions(['defaultFont' => 'sans-serif']);

    

        return $pdf->download('Facturacion_'. $sale->client->name. '>ID:' . $sale->id .'.pdf');

    }



}
