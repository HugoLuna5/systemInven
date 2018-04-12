
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



var productosRespaldo;
var piezasRespaldo;
var id_venta;
var id_cliente;


$("#submit_finish").click(function(e) {
    e.preventDefault();


    var form = $("#form_finish");
    var forma_pago = $("#form_finish").find("input[name='forma_pago']").val();


    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: 'http://127.0.0.1:8000/ajaxRequest3',
        data: form.serialize(),
        success: function (data) {

            alert(data.success);


            window.location.href = "http://127.0.0.1:8000/venta";
        }

    });


});

$("#product-submit").click(function(e){
    e.preventDefault();


    var form = $("#form_products");
    //var id_venta = $("#form_products").find("input[name='id_venta']").val();
    //var id_cliente = $("#form_products").find("input[name='id_cliente']").val();
    var nombre_cliente = $("#form_products").find("input[name='nombre_cliente']").val();
    var productos = $("#form_products").find("select[id='searchable']").val();
    var num_piezas = $("#form_products").find("input[name='num_piezas']").val();



    if (productos != null && num_piezas != null){

        $.ajax({

            type: 'POST',
            dataType: 'json',
            url: 'http://127.0.0.1:8000/ajaxRequest2',
            data:form.serialize(),
            success: function (data) {
                alert(data.success);

                $("#total_doo").text("$"+data.total);
                $("#total_input").val(data.total);

                var str = id_venta+id_cliente+'factura_cynthi';
                var md5 = CryptoJS.MD5(str).toString();

                $("#facturar").attr("href", "http://127.0.0.1:8000/factura/"+data.id_venta+"/"+md5+"/cliente/"+data.id_cliente);

                if (data.id_cliente == 0){
                    $("#forma_pago").attr('disabled','disabled');
                }

                $("#id_user").val(data.id_cliente);

                if(data.credito >= 500) {
                    $("#exceded_credit").css("display", 'block');
                    $("#exceded_credit").text('Este Cliente sobre paso el limite de credito\n Aún así desea venderle');
                    $("#submit_finish").attr("id","submit_finish");
                    $("#submit_finish").attr("disabled","disabled");
                    $("#forma_pago").attr('disabled','disabled');

                    productosRespaldo = data.productosRespaldo;
                    piezasRespaldo = data.piezasRespaldo;
                    id_venta = data.id_venta;
                    id_cliente = data.id_cliente;

                }else{
                    $("#exceded_credit").css("display", 'none');
                    $("#aceptar").css("display", 'none');
                    $("#rechazar").css("display", 'none');



                }

            }


        });

    }else{


        alert("No has seleccionado ningun producto");
    }




});



$("#btn-submit").click(function(e){
    e.preventDefault();
    
    var form_action = $("#form-create").find("form").attr("action");
    var form = $("#form-create");

    var cliente = $("#form-create").find("input[name='cliente']").val();




    $.ajax({
        type:'POST',
        dataType: 'json',
        url: 'http://127.0.0.1:8000/ajaxRequest',
        data:form.serialize(),
        success: function (data) {


            alert(data.success);
            //alert(data.client);

            $("#title-product").text('Agregar productos para el cliente '+data.client);


            $("#id_venta").val(data.id_venta);
            $("#id_cliente").val(data.id_cliente);
            $("#nombre_cliente").val(data.client);
            $("#credit_slider").addClass("control-label");
            $("#credit_slider").attr("id","newid");


        }


    });


});



/*
Actions for credit exceded
 */

//aceptar
$("#aceptar").click(function(e) {
    e.preventDefault();
    $("#exceded_credit").css("display", 'none');
    $("#aceptar").css("display", 'none');
    $("#rechazar").css("display", 'none');
    $("#submit_finish").removeAttr("disabled");
    $("#forma_pago").removeAttr('disabled');



});

//rechazar
$("#rechazar").click(function(e) {
    e.preventDefault();


    $.ajax({


        type: 'POST',
        dataType: 'json',
        url: 'http://127.0.0.1:8000/deleteContent',
        data:{id_venta:id_venta,id_cliente:id_cliente,piezasRespaldo:piezasRespaldo,productosRespaldo:productosRespaldo},
        success: function (data) {


            alert(data.success);
            window.location.href = "http://127.0.0.1:8000/venta";


        }


    });

});





$('#select_doo').on('change', function() {
    var value = $(this).val();
    window.location.href = "http://127.0.0.1:8000/products/show="+value;
});