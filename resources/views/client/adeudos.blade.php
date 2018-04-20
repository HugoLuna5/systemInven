<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mini Super Cynthi</title>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/material-design-icons/css/material-design-iconic-font.min.css")}}"/>

    <link rel="stylesheet" type="text/css" href="http://foxythemes.net/preview/products/beagle/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="http://foxythemes.net/preview/products/beagle/assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="http://foxythemes.net/preview/products/beagle/assets/lib/bootstrap-slider/css/bootstrap-slider.min.css"/>
    <link rel="stylesheet" type="text/css" href="http://foxythemes.net/preview/products/beagle/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="{{url("/assets/css/app.css")}}" type="text/css"/>

    <link rel="stylesheet" href="{{url("/css/icons.css")}}">

    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>




</head>
<body>
<div class="be-wrapper">
    <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
            <div class="be-navbar-header"><a href="{{url("/")}}" class="navbar-brand"></a>
            </div>
            <div class="be-right-navbar">
                <ul class="nav navbar-nav float-right be-user-nav">
                    <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><img src="{{url("assets/img/avatar2.png")}}" alt="Avatar"><span class="user-name">{{Auth::user()->name}}</span></a>
                        <div role="menu" class="dropdown-menu">
                            <div class="user-info">
                                <div class="user-name">{{Auth::user()->name}}</div>
                                <div class="user-position online">Disponible</div>
                            </div>





                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item"><span class="icon mdi mdi-power"></span> Cerrar sesión</a><

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>



                        </div>
                    </li>
                </ul>
                <div class="page-title"><span>Adeudos</span></div>
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
                                    <li class="active"><a href="{{url("/adeudos/clientes")}}"><span class="badge badge-primary float-right">New</span>Adeudos</a>
                                    <li ><a href="{{url("/add-client")}}">Agregar Cliente</a></li>
                                    </li>
                                </ul>
                            </li>

                            <li ><a href="{{url("/proveedores")}}"><i class="icon mdi mdi-dot-circle"></i><span>Proveedores</span></a>

                            </li>
                            <li  class="parent"><a href="#"><i class="icon mdi mdi-border-all"></i><span>Productos</span></a>
                                <ul class="sub-menu">
                                    <li><a href="{{url("/products")}}">Productos</a>
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
            <h2 class="page-head-title">Cuentas pendientes</h2>

        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-table">
                        <!--
                        <div class="row table-filters-container">
                            <div class="col-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-lg-6 table-filters pb-0 pb-xl-4"><span class="table-filter-title">Milestone progress</span>
                                        <div class="filter-container">
                                            <form>
                                                <label class="control-label d-block"><span id="slider-value">10% - 60%</span></label>
                                                <input id="milestone_slider" type="text" data-slider-value="[10,60]" data-slider-step="5" data-slider-max="100" data-slider-min="0" value="50" class="bslider form-control">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 table-filters pb-0 pb-xl-4"><span class="table-filter-title">Proyect</span>
                                        <div class="filter-container">
                                            <label class="control-label">Select a proyect:</label>
                                            <form>
                                                <select class="select2">
                                                    <option value="Bootstrap">Bootstrap Admin</option>
                                                    <option value="CLI">CLI Connector</option>
                                                    <option value="Back-end">Back-end Manager</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-lg-6 table-filters pb-0 pb-xl-4"><span class="table-filter-title">Date</span>
                                        <div class="filter-container">
                                            <form>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="control-label">Since:</label>
                                                        <input type="text" class="form-control form-control-sm datetimepicker">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="control-label">To:</label>
                                                        <input type="text" class="form-control form-control-sm datetimepicker">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 table-filters pb-xl-4"><span class="table-filter-title">Status</span>
                                        <div class="filter-container">
                                            <form>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="custom-controls-stacked">
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Open</span>
                                                            </label>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">In Review</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="custom-controls-stacked">
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Completed</span>
                                                            </label>
                                                            <label class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Reopened</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        -->
                        <div class="card-body">
                            <div class="table-responsive noSwipe">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width:1%;">

                                        </th>
                                        <th style="width:20%;">Nombre</th>
                                        <th style="width:17%;">Marcar pago</th>
                                        <th style="width:15%;">Credito</th>
                                        <th style="width:10%;">Telefono</th>
                                        <th style="width:10%;">Se unio</th>
                                        <th style="width:10%;">Reporte</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($clientes as $cliente)

                                    <tr

                                            @if($cliente->credito >= 500)

                                            style="background: #e84e40; color: white"
                                            @endif

                                    >
                                        <td>

                                        </td>
                                        <td class="user-avatar cell-detail user-info">


                                            @if($cliente->sexo == "Hombre")
                                            <img src="{{url("assets/img/avatar4.png")}}" alt="Avatar" class="mt-0 mt-md-2 mt-lg-0">
                                                @else
                                                <img src="{{url("assets/img/avatar6.png")}}" alt="Avatar" class="mt-0 mt-md-2 mt-lg-0">
                                            @endif

                                            <span>{{$cliente->nombre}}</span><span class="cell-detail-description">{{$cliente->direccion}}</span></td>




                                        <td class="cell-detail">


                                            <a href="#"
                                               data-type="text"
                                               data-pk="{{$cliente->id}}"
                                               data-url="{{url("/clientes/update/$cliente->id")}}"
                                               data-title="Credito"
                                               data-value="{{$cliente->credito}}"
                                               class="set-credito"
                                               data-name="credito"></a>


                                        </td>
                                        <td class="milestone"><span class="completed">{{$cliente->credito}} / 500</span><span class="version">
                                               Porcentaje de credito


                                            </span>
                                            <div class="progress">


                                                <?php

                                                    $op = ($cliente->credito * 100) / 500;

                                                    echo "<div style='width: $op%' class='progress-bar progress-bar-primary'></div>";
                                                        ?>

                                            </div>
                                        </td>
                                        <td class="cell-detail"><span>{{$cliente->telefono}}</span><span class="cell-detail-description">{{$cliente->correo}}</span></td>






                                        <td class="cell-detail"><span>{{$cliente->created_at}}</span><span class="cell-detail-description">{{  $cliente->updated_at}}</span></td>
                                        <td class="text-right">

                                            <a class="btn btn-primary" href="{{url("/clientes/$cliente->id/historial-de-compras")}}">Generar reporte</a>


                                        </td>
                                    </tr>


                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
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
                    <li role="presentation" class="nav-item"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" class="nav-link active">Chat</a></li>
                    <li role="presentation" class="nav-item"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" class="nav-link">Todo</a></li>
                    <li role="presentation" class="nav-item"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" class="nav-link">Settings</a></li>
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
                                                    <div class="user-data"><span class="status offline"></span><span class="name">Joel King   </span><span class="message">Ready for the meeti...</span></div></a></div>
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
                                                <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Initialize the project</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure              </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub              </span>
                                                </label>
                                            </li>
                                        </ul><span class="category-title">Tomorrow</span>
                                        <ul class="todo-list">
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Initialize the project             </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure              </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub              </span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-checkbox custom-control custom-control-sm"><span class="delete mdi mdi-delete"></span>
                                                    <input type="checkbox" class="custom-control-input"><span title="This task is too long to be displayed in a normal space!" class="custom-control-label">This task is too long to be displayed in a normal space!              </span>
                                                </label>
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
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/js/app.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="assets/js/app-tables-datatables.js" type="text/javascript"></script>

<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.ajaxOptions = {type: 'PUT'};
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.tableFilters();
        $(".set-credito").editable();



    });
</script>
</body>
</html>