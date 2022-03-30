<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\Client;
use App\Models\Province;
use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;
use Symfony\Component\VarDumper\Dumper\CliDumper;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $client = Client::all();
        return view('admin.clients.index', compact('client', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_erp = DB::table('t_ncf')->get();

        $provinces = DB::table('t_provincia')->get();

        $id_consumo = $id_erp[0]->f_codigo;
        $id_fiscal = $id_erp[1]->f_codigo;




        return view('admin.clients.create', compact('id_consumo', 'id_fiscal', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        $id_erp = DB::table('t_secuencias')->select('f_secuencia')->where('f_id', 6)->first()->f_secuencia;

    

        Client::create($request->all() + [
            'id_erp' => $id_erp,
            'tipo_registro' => 'Pagina Web',
            'vendedor' => Auth::user()->id_erp, 
        ]);

        DB::table('t_secuencias')->where('f_id', 6)->update(array(
            'f_secuencia'=>  $id_erp + 1));


        return redirect()->route('clients.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $id_erp = DB::table('t_ncf')->get();

        $id_consumo = $id_erp[0]->f_codigo;
        $id_fiscal = $id_erp[1]->f_codigo;

        $provinces =  Province::all();


        return view('admin.clients.edit', compact('client', 'id_consumo', 'id_fiscal', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('clients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');

    }

}
