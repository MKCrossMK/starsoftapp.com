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
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\VarDumper\Dumper\CliDumper;

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
        $sales = Sale::all();
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
        
       


        return view('admin.sales.create', compact('dt'));
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

       $Sale = Sale::create([
            'user_id' => Auth::id(),
            'tipo_factura' => 'B01',
            'no_factura' => '00001',
            'documento' => 'B010001',
            'fecha' => $request->input('fecha'),
            'monto' => $request->input('monto'),
            'itbis' => '50',
            'descuento' => '25',
            't_pago' => 'Efectivo',
            't_cobro' => 'Efectivo',
            'client_id' => $request->input('client_id'),
            'tipo_ncf' => 'B1',
            'ncf' => $request->input('ncf'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $lastsale = $this->lastsale();
        
        for($i = 0; $i < count($request['product_id']); $i++){
            $data[] = array(
            'sale_id'=> $lastsale, 
            'tipo_factura' => 'B01',
            'no_factura' => '00001',
            'documento' => 'B010001',
            'fecha' => $request->input('fecha'),
            'product_id' => $request['product_id'][$i], 
            'cantidad' => $request['cantidad'][$i], 
            'precio' => $request['precio'][$i], 
            'prod_itbis' => $request['prod_itbis'][$i],
            'total' => $request['total'][$i],
            'descuento' =>$request['descuento'][$i]);



        }

        $Sale->saleDetail()->createMany($data);





       
        // $request['user_id'] = Auth::user()->id;
        // // $sale = Sale::create($request->all());
 
       
        // // 'tipo_factura',
        // // 'no_factura',
        // // 'documento',
        // // 'fecha',

        // $request['product_id'] = implode(" ", $request['product_id']);

        // dd($request);

        
     
        // foreach ($request as $key){
        //     $results[] = array("product_id" => $request->product_id[$key], 
        //     "product_name" => $request->product_name[$key], 
        //     "precio" => $request->precio[$key],
        //      "cantidad" =>$request->cantidad[$key], 
        //      "itbis" => $request->itbis[$key], "descuento" => $request->descuento[$key],
        //      "total" => $request->descuento[$key], "prod_itbis" => $request->prod_itbis[$key]);
             
        // }
        // $sale->saleDetail()->createMany($results);
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

    
}
