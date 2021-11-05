<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreRequest;
use App\Models\Client;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Dumper\CliDumper;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('admin.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients =  Client::all();
        return view('admin.sale.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all());
 
        // 'tipo_factura',
        // 'no_factura',
        // 'documento',
        // 'fecha',



        foreach ($request->product_id as $key => $product){
            $results[] = array("product_id" => $request->product_id[$key], 
            "product_name" => $request->product_name[$key], 
            "precio" => $request->precio[$key],
             "cantidad" =>$request->cantidad[$key], "costo" => $request->costo[$key], 
             "itbis" => $request->itbis[$key], "descuento" => $request->descuento[$key],
             "total" => $request->descuento[$key], "prod_itbis" => $request->prod_itbis[$key]);
             
        }
        $sale->saleDetail()->createMany($results);
        return redirect()->route('sales.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('admin.sale.show', compact('sale'));
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
}
