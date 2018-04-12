<?php

namespace App\Http\Controllers;

use App\model\Product;
use Illuminate\Http\Request;
use Auth;


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
        $producto->estado_producto = $request->estado_factura;
        $producto->cantidad = $request->piezas;

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
