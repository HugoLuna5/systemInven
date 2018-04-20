<?php

namespace App\Http\Controllers;

use App\model\Client;
use App\model\ProductosVentas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("client.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $client = new Client();

        $client->nombre = $request->nombre;
        $client->direccion = $request->direccion;
        $client->telefono = $request->telefono;
        $client->sexo = $request->sexo;
        $client->correo = $request->email;
        $client->credito = 0;


        if($client->save()){
            return redirect('/add-client')->with('notificationGroupSuccess', '¡Felicidades '.Auth::user()->name.' haz añadido un nuevo cliente ('.$request->nombre.')!');

        }else{
            return redirect('/add-client')->with('notificationGroupError', '¡Upss '.Auth::user()->name.' ocurrio un error ');
        }


    }


    public function adeudos(){


        $clientes = Client::all();

        return view("client.adeudos",['clientes'=>$clientes]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $cliente = Client::find($id);

        $field = $request->name;

        $cliente->$field = $request->value;

        $cliente->save();



            return $cliente->$field;



    }


    public function reporte($id){

        $validate =  ProductosVentas::where('id_cliente','=',$id)->first();
        $compras = ProductosVentas::where('id_cliente','=',$id)->get();
        if ($validate != null){
            $cliente = DB::table('client')->where('id','=',$id)->first();

            $md5 = md5($compras[0]->id_venta.$id.'factura_cynthi');

            $dt = Carbon::createFromFormat('Y-m-d H:i:s',$compras[0]->created_at);
            Carbon::setUtf8(true);



            $fecha = $dt->formatLocalized('%A %d %B %Y');   ;
            return view('client.reporte',compact('compras','md5','fecha','cliente'));
        }else{

            return redirect("/adeudos/clientes");
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
