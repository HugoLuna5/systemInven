<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("/home");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*
 * Productos routes
 */


Route::get("/products", "ProductController@index");
Route::get("/add-product", "ProductController@viewCreate");
Route::post("/add-product", "ProductController@create");

//update

Route::put("/productos/update/{id}","ProductController@updatePiezas");


/*
 * Client routes
 */

Route::get("add-client","ClientsController@create");
Route::post("add-client","ClientsController@store");

Route::put("/clientes/update/{id}","ClientsController@update");

//adeudos
Route::get("/adeudos/clientes","ClientsController@adeudos");