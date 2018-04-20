<?php

namespace App\Http\Controllers;

use App\model\Event;
use App\model\Product;
use App\model\ProductosVentas;
use App\model\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $eventosAc = Event::all();
        $fechaActual = date("Y-m-d H:i");

        foreach ($eventosAc as $ev){

            if ($ev->fecha <= $fechaActual){
                DB::table('event')->where('id',$ev->id)->delete();


            }



        }



        $product = Product::latest()->paginate(1);
        $ingre = ProductosVentas::latest()->paginate(1);


        if ($product[0] != null  ){
            $fecha = $this->getCreatedAtAttribute($product[0]->created_at);
        }
        else{
            $fecha = date("Y-m-d");
        }

        if ($ingre[0] != null) {
            $fechaIngresos = $this->getCreatedAtAttribute($ingre[0]->created_at);
        }else{
            $fechaIngresos = date("Y-m-d");

        }




        $productos = 0;
        $pro = Products::all();
        $prodAll = Product::latest()->simplePaginate(1);

        if ($prodAll[0] == null){
            $productosAll = 0;
        }else{

            $productosAll = $prodAll[0]->id;

        }
        foreach ($pro as $pr) {

            if ($this->getCreatedAtAttribute($pr->created_at) == $fecha){

                $productos = $productos + 1;
            }
        }



        $ingresosData = ProductosVentas::all();

        $ingresos = 0;

        foreach ($ingresosData as $ingreso){

            if ($this->getCreatedAtAttribute($ingreso->created_at) == $fechaIngresos){

                $ingresos = $ingresos + $ingreso->precio;
            }



        }



        $ingresosMes = 0;

        $doo = date("Y-m");

        foreach ($ingresosData as $ingreso){

            if ($this->getCreatedAtAttributeM($ingreso->created_at) == $doo){

                $ingresosMes = $ingresosMes + $ingreso->precio;
            }



        }


        $pocosProductos = DB::table('product')->where('cantidad','<=',3)->get();
        $clientesPendientes = DB::table('client')->where('credito','>=',500)->get();


        $eventos = Event::latest()->simplePaginate();

        return view('home.home',compact('productos','ingresos', 'productosAll','ingresosMes','pocosProductos','clientesPendientes','eventos'));
    }


    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getCreatedAtAttributeM($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m');
    }



    public function proveedor(){

        return view("proveedor.index");
    }

    public function proveedorPost(Request $request){


        $event = new Event();

        $event->nombre = $request->nombre;
        $event->fecha = $request->fecha;

        $event->save();


        return redirect('/proveedores')->with('notificationGroupSuccess', '¡Felicidades ' . Auth::user()->name . ' haz añadido un nuevo evento!');



    }

    public function proveedorDelete($id){



        DB::table('event')->where('id',$id)->delete();


        return back();
    }


    public function productosRestantes(){
        $pocosProductos = DB::table('product')->where('cantidad','<=',3)->get();
        $md5 = md5(time().date("Y-m-d"));

        $fecha = date("Y-m-d");


        return view('home.count', compact('pocosProductos','md5','fecha'));

    }


}
