<?php

namespace App\Http\Controllers;

use App\model\Product;
use App\model\Products;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexDoo(){
        $count = 10;
        $productos = Product::paginate(10);
        $fecha = date("Y-m-d");


        return view("product.index",['productos'=>$productos,'fecha'=>$fecha,'count'=>$count]);

    }
    public function index($count)
    {
        //

        $productos = Product::paginate($count);
        $fecha = date("Y-m-d");


        return view("product.index",['productos'=>$productos,'fecha'=>$fecha,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $producto = new Product();

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->cod_barras = $request->codigo;
        $producto->categoria = $request->categoria;

        if($producto->save()) {

            return redirect('/add-product')->with('notificationGroupSuccess', '¡Felicidades ' . Auth::user()->name . ' haz añadido un nuevo producto (' . $request->nombre . ')!');
        }else{
            return redirect('/add-client')->with('notificationGroupError', '¡Upss '.Auth::user()->name.' ocurrio un error ');
        }






    }

    public function viewCreate()
    {
        //


        return view("product.add");


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
    public function showData($count)
    {
        //
        $productos = Product::paginate($count);
        $fecha = date("Y-m-d");


        return view("product.index",['productos'=>$productos,'fecha'=>$fecha]);
    }


    public function viewCreateExist(){


        $products = Product::all();


        return view('product.exist',compact('products'));
    }

    public function updateProduct(Request $request){

        $cont = $request->piezas;
        for ($i=0; $i<$cont; $i++){
            $products = new Products();

            $products->product_id = $request->nombre;

            $consulta = DB::table('product')->where('id',$request->nombre)->first();


            $products->nombre = $consulta->nombre;
            $products->status = $request->estado_factura;


            $products->save();
        }

        if ($request->estado_factura == "Facturado"){
            $datos = DB::table('product')->where('id',$request->nombre)->first();


            $totalFacturado = $datos->estado_producto_facturado + $cont;
            $total = $datos->cantidad + $cont;
            DB::table('product')->where('id',$request->nombre)->update(['estado_producto_facturado' => $totalFacturado]);
            DB::table('product')->where('id',$request->nombre)->update(['cantidad' => $total]);
        }else{
            $datos = DB::table('product')->where('id',$request->nombre)->first();

            $totalNoFacturado = $datos->estado_producto_no_facturado + $cont;
            $total = $datos->cantidad + $cont;
            DB::table('product')->where('id',$request->nombre)->update(['estado_producto_no_facturado' => $totalNoFacturado]);
            DB::table('product')->where('id',$request->nombre)->update(['cantidad' => $total]);
        }





            return redirect('/add-product-exist')->with('notificationGroupSuccess', '¡Felicidades ' . Auth::user()->name . ' haz añadido un nuevo producto!');



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

    public function updatePiezas(Request $request, $id){

        $producto = Product::find($id);

        $field = $request->name;

        $producto->$field = $request->value;

        $producto->save();

        return $producto->$field;
    }


    public function search(Request $request){

        $s = $request->input('s');
        $count = 50;
        $productos = Product::latest()
            ->search($s)
            ->paginate(50);


        $fecha = date("Y-m-d");


        return view("product.index",['productos'=>$productos,'fecha'=>$fecha,'count'=>$count]);

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
