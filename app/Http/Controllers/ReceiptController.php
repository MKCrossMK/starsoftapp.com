<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipt = Receipt::all();
        return view('admin.receipt.index', compact('receipt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dt = Carbon::now('America/Santo_Domingo')->format('d-m-Y');
        
        if (Auth::user()->name === 'admin'){
            $sales = Sale::all()->where('tipo_factura', 'FCR');
        }
        else
        {
            $userid = Auth::user()->id_erp;
            $sales = Sale::all()->where('user_id', $userid)->where('tipo_factura', 'FCR');
       }



        return view('admin.receipt.create', compact('dt', 'sales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

        $receipt = Receipt::create([
             'user_id' => Auth::id(),
             'no_receipt' => DB::raw('no_receipt +'),
             'fecha' => $request->input('fecha'),
             'fecha_vencimiento' => $request->input('fecha_vencimiento'),
             'monto' => $request->input('monto'),
             'balance' => $request->input('balance'),
             'anulado' =>  false,
             'concepto' => $request->input('concepto'),
             'client_id' => $request->input('client_id'),
             'created_at' => now(),
             'updated_at' => now(),
         ]);
 
         $lastreceipt = $this->lastreceipt();
         
         for($i = 0; $i < count($request['product_id']); $i++){
             $data[] = array(
             'receipt_id'=> $lastreceipt, 
             'sales_id' => $request['product_id'][$i], 
             'documento' => $request['documento'][$i], 
             'no_factura' => $request['no_factura'][$i], 
             'ncf' => $request['ncf'][$i],
             'balance' => $request['monto'][$i],
             'total' =>$request['total'][$i]);
 
             
    }
    $receipt->receiptDetail()->createMany($data);
    

    return redirect()->route('indexreceipt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
    }

    
    public function lastreceipt(){
        return Receipt::latest('id')->first();
    
    }
}
