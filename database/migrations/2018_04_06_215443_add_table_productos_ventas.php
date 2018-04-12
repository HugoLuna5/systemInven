<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableProductosVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_venta');
            $table->integer('id_cliente');
            $table->integer('id_producto');
            $table->text('nombre_cliente');
            $table->text('producto');
            $table->text('cod_barras');
            $table->text('categoria');
            $table->text('estado_producto');
            $table->text('piezas');
            $table->decimal('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_ventas');
    }
}
