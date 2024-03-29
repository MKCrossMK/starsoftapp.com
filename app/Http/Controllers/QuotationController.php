<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Color;
use App\Models\Product;
use App\Models\Quotation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{

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
        
        if (Auth::user()->role === 1){
            $quotes = Quotation::orderBy('id', 'desc')->get();
        }
        else
        {
            $userid = Auth::user()->id;
            $quotes = Quotation::orderBy('id', 'desc')->where('user_id', $userid)->get();
       }
       
        
        return view('admin.quotations.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dt = Carbon::now('America/Santo_Domingo')->format('Y-m-d');
        $products = Product::all();
        $userid = Auth::user()->id_erp;
        $clients = DB::table('clients')->where('vendedor', 1)->orWhere('vendedor', $userid)->orWhere('vendedor', null)->get();

        $colors = Color::all();;
    


        return view('admin.quotations.create', compact('dt', 'products', 'clients', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    

        $fc = DB::table('t_secuencias')->select('f_secuencia')->where('f_id', 1)->first()->f_secuencia;
        
        $userid = Auth::user()->id;

        for($i = 0; $i < count($request['product_id']); $i++){
            $d[] = $request['precio'][$i] * $request['descuento'][$i]  / 100;      
         }
 
         $total_descuento = array_sum($d);

        $Sale = Quotation::create([
             'user_id' => Auth::id(),
             'nombre_vendedor' => Auth::user()->name,
             'nombre_usuario' => Auth::user()->name,
            //  'no_quote' => '00001',
             'registradopor' => Auth::user()->id_erp,
             'fecha' => $request->input('fecha'),
             'monto' => $request->input('monto'),
             'itbis' => $request->input('imp_itbis'),
             'descuento' => $request->input('total_descuento'),
             'client_id' => $request->input('client_id'),
             'nombre_cliente' => $request->input('cliente_name'),
             'created_at' => now(),
             'updated_at' => now(),
         ]);
 
         $lastquote = $this->lastsale();
         
         for($i = 0; $i < count($request['product_id']); $i++){
             $data[] = array(
             'quotation_id'=> $lastquote, 
            //  'tipo_quote' => 'B01',
            //  'no_quote' => '00001',
            //  'documento' => 'B010001',
             'fecha' => $request->input('fecha'),
             'product_id' => $request['product_id'][$i], 
             'cantidad' => $request['cantidad'][$i], 
             'precio' => $request['precio'][$i], 
             'prod_itbis' => $request['prod_itbis'][$i],
             'total' => $request['total'][$i],
             'descuento' =>$request['descuento'][$i],
             'prod_color' => $request['prod_color'][$i],);
             
 
             
    }
    $Sale->quoteDetail()->createMany($data);
    

    return redirect()->route('indexquote');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(quotation $quotation)
    {
        
        $subtotal = 0;
        $quoteDetails = $quotation->quoteDetail;
        // $count = count($quoteDetails);
        foreach ($quoteDetails as $quoteDetail) {
            $totalDetail = $quoteDetail->cantidad * $quoteDetail->precio ;
            // $desc =  $totalDetail * ($quoteDetail->descuento / 100);
            $subtotal += $totalDetail ;
        }
        return view('admin.quotations.show', compact('quotation', 'quoteDetails', 'subtotal',));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(quotation $quotation)
    {
        $clients = Client::all();
        return view('admin.quotations.show', compact('clients', 'quotation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(quotation $quotation)
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
        return Quotation::latest('id')->first();
    
    }

    public function lastquote(){
        return Quotation::latest('no_quote')->first();
    
    }

    public function pdf(Quotation $quotation)
    
    {

        $subtotal = 0;
        $quoteDetails = $quotation->quoteDetail;
        foreach ($quoteDetails as $quoteDetail) {
            $totalDetail = $quoteDetail->cantidad * $quoteDetail->precio ;
            // $desc =  $totalDetail * ($quoteDetail->descuento / 100);
            $subtotal += $totalDetail ;
        }
        

        $pdf = PDF::loadView('admin.quotations.viewpdf', compact('quotation', 'quoteDetails', 'subtotal'))->setOptions(['defaultFont' => 'sans-serif']);


        return $pdf->download('Cotizacion_'. $quotation->client->name. '>ID:' . $quotation->id .'.pdf');

    }
}
