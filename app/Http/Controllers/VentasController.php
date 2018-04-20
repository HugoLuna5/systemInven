<?php

namespace App\Http\Controllers;

use App\model\Client;
use App\model\Product;
use App\model\ProductosVentas;
use App\model\Products;
use App\model\Ventas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Client::all();
        $productos = DB::table('product')->where('cantidad','>',0)->get();

        return view('ventas.index',['clientes'=>$clientes, 'productos'=>$productos]);
    }


    public function ajaxRequestAddCliente(Request $request)
    {
        //$post = Ventas::create($request->all());

        //return response()->json($post);
        $client = $request->cliente;
        if ($client == 0) {




            $venta = new Ventas();

            $venta->id_comprador = 0;
            $venta->nombre_comprador = "Otro";

            $venta->save();



            return response()->json(['success' => 'Compra registrada, para el cliente Otro', 'client' => 'Otro', 'id_venta' => $venta->id, 'id_cliente' => 0]);



        } else {

        $consulta = DB::table('client')->where('id', '=', $client)->first();

        if ($consulta != null) {

            $venta = new Ventas();

            $venta->id_comprador = $consulta->id;
            $venta->nombre_comprador = $consulta->nombre;

            $venta->save();


            return response()->json(['success' => 'Compra registrada, para el cliente ' . $consulta->nombre, 'client' => $consulta->nombre, 'id_venta' => $venta->id, 'id_cliente' => $consulta->id]);


        }
    }


    }


    public function ajaxRequestAddProducts(Request $request){

        $productos = $request->productos;



        $arDo = array($request->productos);
        $count = 0;
        foreach ($productos as $pro){


            if ($request->id_cliente == 0) {


                $productosVentas = new ProductosVentas();


                $productosVentas->id_venta = $request->id_venta;
                $productosVentas->id_cliente = 0;
                $productosVentas->nombre_cliente = "Otro";

                $productoDoo = DB::table('products')->where('product_id', '=', $pro)->first();
                $productoDoo2 = DB::table('product')->where('id', '=', $pro)->first();

                $productosVentas->producto = $productoDoo->nombre;
                $productosVentas->cod_barras = $productoDoo2->cod_barras;
                $productosVentas->categoria = $productoDoo2->categoria;
                $productosVentas->estado_producto = $productoDoo->status;
                $productosVentas->id_producto = $pro;


                $array_doo = explode(',', $request->num_piezas);


                $productosVentas->piezas = $array_doo[$count];
                $productosVentas->precio = $productoDoo2->precio * $array_doo[$count];


                /*
                for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                    $query = DB::table('products')->where('product_id',$productoDoo->id)->orderBy('id','asc')->first();

                    DB::table('products')->where('id',$query->id)->delete();
                }
                */





                $productosVentas->save();

                $count++;


            } else {

                $productosVentas = new ProductosVentas();


                $productosVentas->id_venta = $request->id_venta;
                $productosVentas->id_cliente = $request->id_cliente;
                $productosVentas->nombre_cliente = $request->nombre_cliente;

                $productoDoo = DB::table('products')->where('product_id', '=', $pro)->first();
                $productoDoo2 = DB::table('product')->where('id', '=', $pro)->first();

                $productosVentas->producto = $productoDoo->nombre;
                $productosVentas->cod_barras = $productoDoo2->cod_barras;
                $productosVentas->categoria = $productoDoo2->categoria;
                $productosVentas->estado_producto = $productoDoo->status;
                $productosVentas->id_producto = $pro;


                $array_doo = explode(',', $request->num_piezas);


                $productosVentas->piezas = $array_doo[$count];
                $productosVentas->precio = $productoDoo2->precio * $array_doo[$count];

                /*
                for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                    $query = DB::table('products')->where('product_id',$productoDoo->id)->orderBy('id','asc')->first();

                    DB::table('products')->where('id',$query->id)->delete();
                }
                */




                $productosVentas->save();

                $count++;


            }


        }


        $dataSuma =  DB::table('productos_ventas')->where('id_venta','=',$request->id_venta)->get();


        $total = 0;
        foreach ($dataSuma as $su){
            $total = $total + $su->precio;

        }


        $creditoCliente = Client::find($productosVentas->id_cliente);

        if ($creditoCliente != null) {
            $dss = $creditoCliente->credito;
        }else{
            $dss = 0;
        }


        return response()->json(['success' => 'Productos guardados, para el cliente ','total'=>$total,'id_cliente'=>$productosVentas->id_cliente,'credito'=>$dss,'productosRespaldo'=>$request->productos,'piezasRespaldo'=>$request->num_piezas,'id_venta'=>$productosVentas->id_venta]);


    }

    public function ajaxRequestComplete(Request $request){


        $forma_pago = $request->forma_pago;
        $total = $request->total_input;
        $id_user = $request->id_cliente;
        $count = 0;
        $piezas = $request->piezasRespaldo;
        $productos = $request-> productosRespaldo;



            foreach ($productos as $producto){


                if ($forma_pago == "contado" || $id_user == 0 ){//pago de contado


                    $products = DB::table('products')->where('product_id', '=', $producto)->first();
                    $product = DB::table('product')->where('id', '=', $producto)->first();

                    $array_doo = explode(',', $piezas);


                    $productoUpdate = Product::find($product->id);

                    $restaTotal = $product->cantidad - $array_doo[$count];

                    $productoUpdate->cantidad = $restaTotal;
                    if ($products->status == "Facturado"){
                        $restaFacturado = $product->estado_producto_facturado - $array_doo[$count];

                        $productoUpdate->estado_producto_facturado = $restaFacturado;
                    }else{
                        $restaNoFacturado = $product->estado_producto_no_facturado - $array_doo[$count];

                        $productoUpdate->estado_producto_no_facturado = $restaNoFacturado;

                    }
                    $productoUpdate->save();


                    for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                        $query = DB::table('products')->where('product_id',$product->id)->orderBy('id','asc')->first();

                        Products::find($query->id)->delete();

                        //DB::table('products')->where('id',$query->id)->delete();
                    }





                    $count++;


                }else{//pago a cuenta


                    $products = DB::table('products')->where('product_id', '=', $producto)->first();
                    $product = DB::table('product')->where('id', '=', $producto)->first();

                    $array_doo = explode(',', $piezas);


                    $productoUpdate = Product::find($product->id);

                    $restaTotal = $product->cantidad - $array_doo[$count];

                    $productoUpdate->cantidad = $restaTotal;
                    if ($products->status == "Facturado"){
                        $restaFacturado = $product->estado_producto_facturado - $array_doo[$count];

                        $productoUpdate->estado_producto_facturado = $restaFacturado;
                    }else{
                        $restaNoFacturado = $product->estado_producto_no_facturado - $array_doo[$count];

                        $productoUpdate->estado_producto_no_facturado = $restaNoFacturado;

                    }
                    $productoUpdate->save();


                    for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                        $query = DB::table('products')->where('product_id',$product->id)->orderBy('id','asc')->first();

                        Products::find($query->id)->delete();

                        //DB::table('products')->where('id',$query->id)->delete();
                    }

                    $count ++;




                }





                }

                if ($forma_pago != "contado"){
                    $dataSuma =  DB::table('productos_ventas')->where('id_venta','=',$request->id_venta)->get();

                    $total = 0;
                    foreach ($dataSuma as $su){
                        $total = $total + $su->precio;

                    }

                    $cliente = Client::find($id_user);

                    $operacion = $cliente->credito + $total;

                    $cliente->credito = $operacion;

                    $cliente->save();
                }










        if($request->ajax())
        {
            return response()->json(['success' => '¡Felicidades ' . Auth::user()->name . ' haz añadido una nueva compra de  ' . $total . '!']);
        }

        return redirect('/home')->with('notificationGroupSuccess', '¡Felicidades ' . Auth::user()->name . ' haz añadido una nueva compra de  ' . $total . '!');


    }


    public function Doooo(Request $request){

        $productos = $request->productos;



        $arDo = array($request->productos);
        $count = 0;
        foreach ($productos as $pro){


            if ($request->id_cliente == 0) {





                $productoDoo = DB::table('products')->where('product_id', '=', $pro)->first();
                $productoDoo2 = DB::table('product')->where('id', '=', $pro)->first();



                $array_doo = explode(',', $request->num_piezas);




                for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                    $query = DB::table('products')->where('product_id',$productoDoo->id)->orderBy('id','asc')->first();

                    DB::table('products')->where('id',$query->id)->delete();
                }



                $productoUpdate = Product::find($productoDoo2->id);

                $resta = $productoDoo->cantidad - $array_doo[$count];

                $productoDoo2->cantidad = $resta;

                $productoUpdate->save();

                $count++;


            } else {




                $productoDoo = DB::table('products')->where('product_id', '=', $pro)->first();
                $productoDoo2 = DB::table('product')->where('id', '=', $pro)->first();



                $array_doo = explode(',', $request->num_piezas);




                for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                    $query = DB::table('products')->where('product_id',$productoDoo->id)->orderBy('id','asc')->first();

                    DB::table('products')->where('id',$query->id)->delete();
                }


                $productoUpdate = Product::find($productoDoo->id);

                $resta = $productoDoo2->cantidad - $array_doo[$count];

                $productoUpdate->cantidad = $resta;

                $productoUpdate->save();

                $count++;


            }


        }


        $dataSuma =  DB::table('productos_ventas')->where('id_venta','=',$request->id_venta)->get();




        $total = 0;
        foreach ($dataSuma as $su){
            $total = $total + $su->precio;

        }


        $creditoCliente = Client::find($request->id_cliente);

        if ($creditoCliente != null) {
            $dss = $creditoCliente->credito;
        }else{
            $dss = 0;
        }




    }




    public function factura($id_venta, $md5, $id_cliente){



        if ($id_cliente != 0){

            $compras = DB::table('productos_ventas')->where('id_venta','=',$id_venta)->where('id_cliente','=',$id_cliente)->get();


            $cliente = DB::table('client')->where('id','=',$id_cliente)->first();


            $total = 0;

            foreach ($compras as $compra){

                $total = $total + $compra->precio;

            }



            $fecha = date("Y-m-d H:i:s");
            return view('ventas.factura',compact('compras','md5','fecha','cliente','total'));


        }else{
            $compras = DB::table('productos_ventas')->where('id_venta','=',$id_venta)->where('id_cliente','=',$id_cliente)->get();


            $cliente = DB::table('client')->where('id','=',1)->first();


            $fecha = date("Y-m-d H:i:s");


            $total = 0;

            foreach ($compras as $compra){

                $total = $total + $compra->precio;

            }



            return view('ventas.factura',compact('compras','md5','fecha','cliente','total'));
        }



    }


    public function ajaxRequestDelete(Request $request){

        /*
         * Revert content of products
         */

        $arDo = array($request->productosRespaldo);



            $productosVentas = DB::table('productos_ventas')->where('id_venta',$request->id_venta)->where('id_cliente',$request->id_cliente)->get();






        foreach ($productosVentas as $produVen){

            $fechaDoo = date('Y-m-d H:i');
            if ($this->getCreatedAtAttribute($produVen->created_at) == $fechaDoo ) {

                $update = DB::table('product')->where('id', $produVen->id_producto)->first();


                $cont = $produVen->piezas;

                $total = $cont + $update->cantidad;

                DB::table('product')->where('id', $produVen->id_producto)->update(['cantidad' => $total]);

            }

            }



        ProductosVentas::where('id_venta',$request->id_venta)->where('id_cliente',$request->id_cliente)->delete();
        Ventas::where('id',$request->id_venta)->where('id_comprador',$request->id_cliente)->delete();






        return response()->json(['success' => '¡Haz cancelado la compra']);



    }


    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i');
    }

    public function getCreatedAtAttributeYMD($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }



    public function facturaDia(){






        $fecha = date("Y-m-d");
        $md5 = md5("factura_dia".$fecha);
        //Carbon::setUtf8(true);

        $compras = DB::table('productos_ventas')->where('estado_producto','Facturado')->where('created_at',$fecha)->get();


        $total = 0;
        foreach ($compras as $compra){
            if ($compras[0]->created_at == $fecha){

                $total = $total + $compra->precio;

            }

        }





        return view('ventas.factura_dia',compact('compras','md5','fecha','total'));



    }



    public function facturaFecha($fecha){


        $md5 = md5("factura_dia".$fecha);
        //Carbon::setUtf8(true);

        $compras = DB::table('productos_ventas')->where('estado_producto','Facturado')->where('created_at',$fecha)->get();


        $total = 0;
        foreach ($compras as $compra){
            if ($compras[0]->created_at == $fecha){

                $total = $total + $compra->precio;

            }

        }





        return view('ventas.factura_dia',compact('compras','md5','fecha','total'));



    }


    public function facturaProducto($fecha,$id){


        $md5 = md5("factura_dia".$fecha);
        //Carbon::setUtf8(true);

        $compras = DB::table('productos_ventas')->where('estado_producto','Facturado')->where('created_at',$fecha)->where('id_producto',$id)->get();


        $total = 0;
        foreach ($compras as $compra){
            if ($compras[0]->created_at == $fecha){

                $total = $total + $compra->precio;

            }

        }





        return view('ventas.factura_dia',compact('compras','md5','fecha','total'));

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /*

    if ($forma_pago == "contado"){//forma de pago contado


            $productos = $request->productosRespaldo;



            $arDo = array($request->productosRespaldo);
            foreach ($productos as $pro){


                if ($request->id_cliente == 0) {//forma de pago contado y usuario == 0





                    $productoDoo = DB::table('products')->where('product_id', '=', $pro)->first();
                    $productoDoo2 = DB::table('product')->where('id', '=', $pro)->first();



                    $array_doo = explode(',', $request->piezasRespaldo);



                    $productoUpdate = Product::find($productoDoo2->id);

                    $restaTotal = ((int)$productoDoo2->cantidad - (int)$array_doo[$count]);

                    $productoUpdate->cantidad = $restaTotal;
                    if ($productoDoo->status == "Facturado"){
                        $restaFacturado = ((int)$productoDoo2->estado_producto_facturado - (int)$array_doo[$count]) ;

                        $productoUpdate->estado_producto_facturado = $restaFacturado;
                    }else{
                        $restaNoFacturado = ((int)$productoDoo2->estado_producto_no_facturado - (int)$array_doo[$count]);

                        $productoUpdate->estado_producto_no_facturado = $restaNoFacturado;

                    }
                    $productoUpdate->save();





                    for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                        $query = DB::table('products')->where('product_id',$productoDoo2->id)->orderBy('id','asc')->first();



                        DB::table('products')->where('id',$query->id)->delete();
                    }





                    $count++;


                } else {//forma de pago contado y usuario != 0




                    $productoDoo = DB::table('products')->where('product_id', '=', $pro)->first();
                    $productoDoo2 = DB::table('product')->where('id', '=', $pro)->first();



                    $array_doo = explode(',', $request->piezasRespaldo);




                    $productoUpdate = Product::find($productoDoo2->id);

                    $restaTotal = ((int)$productoDoo2->cantidad - (int)$array_doo[$count]);

                    $productoUpdate->cantidad = $restaTotal;
                    if ($productoDoo->status == "Facturado"){
                        $restaFacturado = ((int)$productoDoo2->estado_producto_facturado - (int)$array_doo[$count]) ;

                        $productoUpdate->estado_producto_facturado = $restaFacturado;
                    }else{
                        $restaNoFacturado = ((int)$productoDoo2->estado_producto_no_facturado - (int)$array_doo[$count]);

                        $productoUpdate->estado_producto_no_facturado = $restaNoFacturado;

                    }
                    $productoUpdate->save();




                    for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                        $query = DB::table('products')->where('product_id',$productoDoo2->id)->orderBy('id','asc')->first();




                        DB::table('products')->where('id',$query->id)->delete();
                    }





                    $count++;


                }


            }


            $dataSuma =  DB::table('productos_ventas')->where('id_venta','=',$request->id_venta)->get();




            $total = 0;
            foreach ($dataSuma as $su){
                $total = $total + $su->precio;

            }



                $dss = 0;








        }else{//forma de pago credito



            $productos = $request->productosRespaldo;



            $arDo = array($request->productosRespaldo);
            foreach ($productos as $pro){


                if ($request->id_cliente == 0) {//forma de pago credito y usuario == 0





                    $productoDoo = DB::table('products')->where('product_id', '=', $pro)->first();
                    $productoDoo2 = DB::table('product')->where('id', '=', $pro)->first();



                    $array_doo = explode(',', $request->piezasRespaldo);


                    $productoUpdate = Product::find($productoDoo2->id);

                    $restaTotal = ((int)$productoDoo2->cantidad - (int)$array_doo[$count]);

                    $productoUpdate->cantidad = $restaTotal;
                    if ($productoDoo->status == "Facturado"){
                        $restaFacturado = ((int)$productoDoo2->estado_producto_facturado - (int)$array_doo[$count]) ;

                        $productoUpdate->estado_producto_facturado = $restaFacturado;
                    }else{
                        $restaNoFacturado = ((int)$productoDoo2->estado_producto_no_facturado - (int)$array_doo[$count]);

                        $productoUpdate->estado_producto_no_facturado = $restaNoFacturado;

                    }
                    $productoUpdate->save();






                    for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                        $query = DB::table('products')->where('product_id',$productoDoo->id)->orderBy('id','asc')->first();



                        DB::table('products')->where('id',$query->id)->delete();
                    }





                    $count++;


                } else {//forma de pago credito y usuario != 0




                    $productoDoo = DB::table('products')->where('product_id', '=', $pro)->first();
                    $productoDoo2 = DB::table('product')->where('id', '=', $pro)->first();



                    $array_doo = explode(',', $request->num_piezas);




                    $productoUpdate = Product::find($productoDoo2->id);

                    $restaTotal = ((int)$productoDoo2->cantidad - (int)$array_doo[$count]);

                    $productoUpdate->cantidad = $restaTotal;
                    if ($productoDoo->status == "Facturado"){
                        $restaFacturado = ((int)$productoDoo2->estado_producto_facturado - (int)$array_doo[$count]) ;

                        $productoUpdate->estado_producto_facturado = $restaFacturado;
                    }else{
                        $restaNoFacturado = ((int)$productoDoo2->estado_producto_no_facturado - (int)$array_doo[$count]);

                        $productoUpdate->estado_producto_no_facturado = $restaNoFacturado;

                    }
                    $productoUpdate->save();




                    for ($doo = 0; $doo < $array_doo[$count]; $doo++) {
                        $query = DB::table('products')->where('product_id',$productoDoo->id)->orderBy('id','asc')->first();






                        DB::table('products')->where('id',$query->id)->delete();
                    }





                    $count++;


                }


            }


            $dataSuma =  DB::table('productos_ventas')->where('id_venta','=',$request->id_venta)->get();




            $total = 0;
            foreach ($dataSuma as $su){
                $total = $total + $su->precio;

            }






                $cliente = Client::find($id_user);

                $operacion = $cliente->credito + $total;

                $cliente->credito = $operacion;

                $cliente->save();







        }
     */
}
