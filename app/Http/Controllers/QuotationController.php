<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Quotation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $quotes = Quotation::all();
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
    


        return view('admin.quotations.create', compact('dt'));
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

        $Sale = Quotation::create([
             'user_id' => Auth::id(),
            //  'tipo_quote' => 'B01',
            //  'no_quote' => '00001',
            //  'documento' => 'B010001',
             'fecha' => $request->input('fecha'),
             'monto' => $request->input('monto'),
             'itbis' => $request->input('imp_itbis'),
             'descuento' =>  $total_descuento,
             'client_id' => $request->input('client_id'),
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
             'descuento' =>$request['descuento'][$i]);
 
             
             $Sale->quoteDetail()->createMany($data);
    }

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
        return view('admin.quotations.show', compact('sale'));

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
}
