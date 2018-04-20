<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Mini Super Cynthi</title>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/material-design-icons/css/material-design-iconic-font.min.css")}}"/>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/datatables/css/dataTables.bootstrap.min.css")}}"/>
    <link rel="stylesheet" href="{{url("assets/css/style.css")}}" type="text/css"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>


    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/jquery.gritter/css/jquery.gritter.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/select2/css/select2.min.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/bootstrap-slider/css/bootstrap-slider.css")}}"/>


</head>
<body>
<div class="be-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
            <div class="navbar-header"><a href="{{url("/")}}" class="navbar-brand"></a></div>
            <div class="be-right-navbar">
                <ul class="nav navbar-nav navbar-right be-user-nav">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="assets/img/avatar2.png" alt="Avatar"><span class="user-name">{{Auth::user()->name}}</span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <div class="user-info">
                                    <div class="user-name">{{Auth::user()->name}}</div>
                                    <div class="user-position online">Disponible</div>
                                </div>
                            </li>
                            <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="icon mdi mdi-power"></span> Cerrar sesión</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                </ul>
                <div class="page-title"><span>Productos</span></div>
            </div>
        </div>
    </nav>
    <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Tablero</a>
            <div class="left-sidebar-spacer">
                <div class="left-sidebar-scroll">
                    <div class="left-sidebar-content">
                        <ul class="sidebar-elements">
                            <li class="divider">Tablero</li>
                            <li ><a href="{{url("/")}}"><i class="icon mdi mdi-home"></i><span>Inicio</span></a>
                            </li>
                            <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>Clientes</span></a>
                                <ul class="sub-menu">
                                    <li><a href="{{url("/adeudos/clientes")}}"><span class="label label-primary pull-right">New</span>Adeudos</a>
                                    <li><a href="{{url("/add-client")}}">Agregar Cliente</a></li>
                                    </li>
                                </ul>
                            </li>

                            <li ><a href="{{url("/proveedores")}}"><i class="icon mdi mdi-dot-circle"></i><span>Proveedores</span></a>

                            </li>
                            <li  class="parent"><a href="#"><i class="icon mdi mdi-border-all"></i><span>Productos</span></a>
                                <ul class="sub-menu">
                                    <li class="active"><a href="{{url("/products")}}">Productos</a>
                                    </li>
                                    <li ><a href="{{url("/add-product")}}">Agregar un nuevo producto</a>
                                    </li>
                                    <li ><a href="{{url("/add-product-exist")}}">Agregar producto existente</a>
                                    </li>
                                </ul>
                            </li>
                            <li ><a href="{{url("/venta")}}"><i class="icon mdi mdi-layers"></i><span>Movimientos</span></a>

                            </li>



                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="be-content">
        <div class="page-head">
            <h2 class="page-head-title">Productos</h2>

        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">Todos los productos
                            <a href="{{url("/facturas-dia")}}" class="btn btn-success">Reporte del día</a>
                            <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                        </div>
                        <div class="panel-body">
                            <table id="" class="table table-striped table-hover table-fw-widget dataTables_wrapper form-inline dt-bootstrap no-footer">

                                <div class="container">


                                    <div class="row ">
                                        <div class="col-sm-6">
                                            <div class="dataTables_length" id="table1_length">
                                                <label class="col-sm-3 control-label">Mostrar
                                                    <select id="select_doo" name="table1_length" aria-controls="table1" class="form-control input-sm">
                                                        @if($count == 10)
                                                         <option selected id="paginate_uno" value="10">10</option>
                                                         <option id="paginate_dos" value="25">25</option>
                                                         <option id="paginate_tres" value="50">50</option>
                                                         <option id="paginate_cuatro" value="100">100</option>

                                                        @elseif($count == 25)
                                                         <option id="paginate_uno" value="10">10</option>
                                                         <option selected id="paginate_dos" value="25">25</option>
                                                         <option id="paginate_tres" value="50">50</option>
                                                         <option id="paginate_cuatro" value="100">100</option>

                                                        @elseif($count == 50)
                                                          <option id="paginate_uno" value="10">10</option>
                                                          <option id="paginate_dos" value="25">25</option>
                                                          <option selected id="paginate_tres" value="50">50</option>
                                                          <option id="paginate_cuatro" value="100">100</option>

                                                        @else
                                                          <option id="paginate_uno" value="10">10</option>
                                                          <option id="paginate_dos" value="25">25</option>
                                                          <option id="paginate_tres" value="50">50</option>
                                                          <option selected id="paginate_cuatro" value="100">100</option>

                                                        @endif
                                                    </select> productos</label>
                                            </div>
                                        </div>



                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-2">




                                                </div>
                                                <div class="col-md-6">
                                                    <div id="table1_filter" class="dataTables_filter">
                                                        <label >Buscar:
                                                            <form role="form" method="get" action='{{url("/search")}}' class="form-inline">
                                                                <input name="s" id="s" type="search" class="form-control input-sm" placeholder="" aria-controls="table1">
                                                            </form>
                                                        </label>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>



                                    <!--
                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Mostrar</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="categoria">
                                                        <option value="10" selected>10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                </select>
                                            </div>
                                            <label class="col-sm-3 control-label">Productos</label>
                                        </div>


                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group">

                                            <form action="" class="form-inline">
                                                <label class="col-sm-3 control-label">Buscar</label>
                                                <div class="col-sm-6">
                                                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="table1">
                                                </div>
                                            </form>


                                        </div>


                                    </div>
                                    -->

                                    <hr>
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Rep.</th>
                                    <th>Precio</th>
                                    <th>Cod. Barras</th>
                                    <th>Estado</th>
                                    <th>Categoria</th>
                                    <th>Piezas</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($productos as $producto)

                                <tr class="odd gradeA">
                                    <td>
                                        {{$producto->nombre}}

                                        <a href="#"
                                           data-type="text"
                                           data-pk="{{$producto->id}}"
                                           data-url="{{url("/productos/update/$producto->id")}}"
                                           data-title="Nombre"
                                           data-value="{{$producto->nombre}}"
                                           class="set-nombre"
                                           data-name="nombre"></a>

                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{url("/facturas-dia/$fecha/producto/$producto->id")}}">Reporte</a>
                                    </td>
                                    <td>

                                        <a href="#"
                                           data-type="text"
                                           data-pk="{{$producto->id}}"
                                           data-url="{{url("/productos/update/$producto->id")}}"
                                           data-title="Precio"
                                           data-value="{{$producto->precio}}"
                                           class="set-precio"
                                           data-name="precio"></a>

                                    </td>
                                    <td>
                                        <a href="#"
                                           data-type="text"
                                           data-pk="{{$producto->id}}"
                                           data-url="{{url("/productos/update/$producto->id")}}"
                                           data-title="Estado"
                                           data-value="{{$producto->cod_barras}}"
                                           class="set-cod_barras"
                                           data-name="cod_barras"></a>

                                    </td>
                                    <td class="center">

                                        Facturado: {{$producto->estado_producto_facturado}} |
                                        No Facturado: {{$producto->estado_producto_no_facturado}}



                                    </td>
                                    <td class="center">{{$producto->categoria}}</td>
                                    <td class="center">

                                        <a href="#"
                                           data-type="text"
                                           data-pk="{{$producto->id}}"
                                           data-url="{{url("/productos/update/$producto->id")}}"
                                           data-title="Piezas"
                                           data-value="{{$producto->cantidad}}"
                                           class="set-cantidad"
                                           data-name="cantidad"></a>

                                    </td>
                                </tr>

                                @endforeach


                                </tbody>

                            </table>
                        <center>


                            {{ $productos->appends(['show' => $count])->links() }}


                        </center>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <nav class="be-right-sidebar">
        <div class="sb-content">
            <div class="tab-navigation">
                <ul role="tablist" class="nav nav-tabs nav-justified">
                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Chat</a></li>
                    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Todo</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Settings</a></li>
                </ul>
            </div>
            <div class="tab-panel">
                <div class="tab-content">
                    <div id="tab1" role="tabpanel" class="tab-pane tab-chat active">
                        <div class="chat-contacts">
                            <div class="chat-sections">
                                <div class="be-scroller">
                                    <div class="content">
                                        <h2>Recent</h2>
                                        <div class="contact-list contact-list-recent">
                                            <div class="user"><a href="#"><img src="assets/img/avatar1.png" alt="Avatar">
                                                    <div class="user-data"><span class="status away"></span><span class="name">Claire Sassu</span><span class="message">Can you share the...</span></div></a></div>
                                            <div class="user"><a href="#"><img src="assets/img/avatar2.png" alt="Avatar">
                                                    <div class="user-data"><span class="status"></span><span class="name">Maggie jackson</span><span class="message">I confirmed the info.</span></div></a></div>
                                            <div class="user"><a href="#"><img src="assets/img/avatar3.png" alt="Avatar">
                                                    <div class="user-data"><span class="status offline"></span><span class="name">Joel King		</span><span class="message">Ready for the meeti...</span></div></a></div>
                                        </div>
                                        <h2>Contacts</h2>
                                        <div class="contact-list">
                                            <div class="user"><a href="#"><img src="assets/img/avatar4.png" alt="Avatar">
                                                    <div class="user-data2"><span class="status"></span><span class="name">Mike Bolthort</span></div></a></div>
                                            <div class="user"><a href="#"><img src="assets/img/avatar5.png" alt="Avatar">
                                                    <div class="user-data2"><span class="status"></span><span class="name">Maggie jackson</span></div></a></div>
                                            <div class="user"><a href="#"><img src="assets/img/avatar6.png" alt="Avatar">
                                                    <div class="user-data2"><span class="status offline"></span><span class="name">Jhon Voltemar</span></div></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-input">
                                <input type="text" placeholder="Search..." name="q"><span class="mdi mdi-search"></span>
                            </div>
                        </div>
                        <div class="chat-window">
                            <div class="title">
                                <div class="user"><img src="assets/img/avatar2.png" alt="Avatar">
                                    <h2>Maggie jackson</h2><span>Active 1h ago</span>
                                </div><span class="icon return mdi mdi-chevron-left"></span>
                            </div>
                            <div class="chat-messages">
                                <div class="be-scroller">
                                    <div class="content">
                                        <ul>
                                            <li class="friend">
                                                <div class="msg">Hello</div>
                                            </li>
                                            <li class="self">
                                                <div class="msg">Hi, how are you?</div>
                                            </li>
                                            <li class="friend">
                                                <div class="msg">Good, I'll need support with my pc</div>
                                            </li>
                                            <li class="self">
                                                <div class="msg">Sure, just tell me what is going on with your computer?</div>
                                            </li>
                                            <li class="friend">
                                                <div class="msg">I don't know it just turns off suddenly</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-input">
                                <div class="input-wrapper"><span class="photo mdi mdi-camera"></span>
                                    <input type="text" placeholder="Message..." name="q" autocomplete="off"><span class="send-msg mdi mdi-mail-send"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" role="tabpanel" class="tab-pane tab-todo">
                        <div class="todo-container">
                            <div class="todo-wrapper">
                                <div class="be-scroller">
                                    <div class="todo-content"><span class="category-title">Today</span>
                                        <ul class="todo-list">
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo1" type="checkbox" checked="">
                                                    <label for="todo1">Initialize the project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo2" type="checkbox">
                                                    <label for="todo2">Create the main structure</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo3" type="checkbox">
                                                    <label for="todo3">Updates changes to GitHub</label>
                                                </div>
                                            </li>
                                        </ul><span class="category-title">Tomorrow</span>
                                        <ul class="todo-list">
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo4" type="checkbox">
                                                    <label for="todo4">Initialize the project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo5" type="checkbox">
                                                    <label for="todo5">Create the main structure</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo6" type="checkbox">
                                                    <label for="todo6">Updates changes to GitHub</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="be-checkbox be-checkbox-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input id="todo7" type="checkbox">
                                                    <label for="todo7" title="This task is too long to be displayed in a normal space!">This task is too long to be displayed in a normal space!</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-input">
                                <input type="text" placeholder="Create new task..." name="q"><span class="mdi mdi-plus"></span>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" role="tabpanel" class="tab-pane tab-settings">
                        <div class="settings-wrapper">
                            <div class="be-scroller"><span class="category-title">General</span>
                                <ul class="settings-list">
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st1" id="st1"><span>
                            <label for="st1"></label></span>
                                        </div><span class="name">Available</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st2" id="st2"><span>
                            <label for="st2"></label></span>
                                        </div><span class="name">Enable notifications</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st3" id="st3"><span>
                            <label for="st3"></label></span>
                                        </div><span class="name">Login with Facebook</span>
                                    </li>
                                </ul><span class="category-title">Notifications</span>
                                <ul class="settings-list">
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" name="st4" id="st4"><span>
                            <label for="st4"></label></span>
                                        </div><span class="name">Email notifications</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st5" id="st5"><span>
                            <label for="st5"></label></span>
                                        </div><span class="name">Project updates</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" checked="" name="st6" id="st6"><span>
                            <label for="st6"></label></span>
                                        </div><span class="name">New comments</span>
                                    </li>
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" name="st7" id="st7"><span>
                            <label for="st7"></label></span>
                                        </div><span class="name">Chat messages</span>
                                    </li>
                                </ul><span class="category-title">Workflow</span>
                                <ul class="settings-list">
                                    <li>
                                        <div class="switch-button switch-button-sm">
                                            <input type="checkbox" name="st8" id="st8"><span>
                            <label for="st8"></label></span>
                                        </div><span class="name">Deploy on commit</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<script src="{{url("assets/lib/jquery/jquery.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/js/main.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/select2/js/select2.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/js/app-form-elements.js")}}" type="text/javascript"></script>

<script src="{{url("assets/lib/bootstrap/dist/js/bootstrap.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/datatables/js/jquery.dataTables.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/datatables/js/dataTables.bootstrap.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/datatables/plugins/buttons/js/buttons.html5.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/datatables/plugins/buttons/js/buttons.flash.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/datatables/plugins/buttons/js/buttons.print.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/datatables/plugins/buttons/js/buttons.colVis.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js")}}" type="text/javascript"></script>
<script src="{{url("assets/js/app-tables-datatables.js")}}" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script src="{{url("/js/posts-ajax.js")}}"></script>






<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.ajaxOptions = {type: 'PUT'};
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dataTables();

        $(".set-cantidad").editable();
        $(".set-precio").editable();
        $(".set-nombre").editable();
        $(".set-cod_barras").editable();
        $(".set-estado").editable({
            source:[
                {
                    value: "No facturado", text: "No facturado"
                },
                {
                    value: "Facturado", text: "Facturado"
                }
            ]
        });



    });
</script>
</body>
</body>
</html>