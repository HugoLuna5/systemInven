<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mini Super Cynthi</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://foxythemes.net/preview/products/beagle/assets/lib/multiselect/css/multi-select.css"/>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
        </head>
<body>
<div class="be-wrapper">


    <!--Success-->
    @if(session('notificationGroupSuccess'))

        <div class="alert alert-success" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
            </button>
            <center><strong>{{session('notificationGroupSuccess')}}</strong></center>
        </div>



    @endif



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
                <div class="page-title"><span>Venta</span></div>
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
                                    <li><a href="{{url("/products")}}">Productos</a>
                                    </li>
                                    <li><a href="{{url("/add-product")}}">Agregar producto</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active"><a href="{{url("/venta")}}"><i class="icon mdi mdi-layers"></i><span>Movimientos</span></a>

                            </li>



                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="be-content">
        <div class="page-head">
            <h2 class="page-head-title">Crear venta</h2>

        </div>
        <div class="main-content container-fluid">
            <div class="row wizard-row">
                <div class="col-md-12 fuelux">
                    <div class="block-wizard panel panel-default">
                        <div id="wizard1" class="wizard wizard-ux">
                            <ul class="steps">
                                <li data-step="1" class="active">Cliente<span class="chevron"></span></li>
                                <li data-step="2">Productos<span class="chevron"></span></li>
                                <li data-step="3">Pago<span class="chevron"></span></li>
                            </ul>
                            <div class="actions">
                                <button type="button" class="btn btn-xs btn-prev btn-default"><i class="icon mdi mdi-chevron-left"></i>Anterior</button>
                                <button type="button" data-last="Finish" class="btn btn-xs btn-next btn-default">Siguiente<i class="icon mdi mdi-chevron-right"></i></button>
                            </div>
                            <div class="step-content">
                                <div data-step="1" class="step-pane active">
                                    <form id="form-create" method="POST" class="form-horizontal group-border-dashed">

                                        <div class="form-group no-padding">
                                            <div class="col-sm-7">
                                                <h3 class="wizard-title">Informacion del cliente</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Nombre del cliente</label>
                                            <div class="col-sm-6">
                                                <select class="select2" name="cliente">
                                                    <optgroup label="Clientes">
                                                        @foreach($clientes as $cliente)
                                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                                            @endforeach

                                                    </optgroup>

                                                    <optgroup label="Otros">
                                                        <option value="0">Otro</option>

                                                    </optgroup>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="reset" class="btn btn-default btn-space" value="Cancelar">
                                                <button type="submit" data-wizard="#wizard1" id="btn-submit"  class="btn btn-primary btn-space wizard-next btn-submit">Siguiente</button>
                                            </div>
                                        </div>
                                    </form>





                                </div>
                                <div data-step="2" class="step-pane">
                                    <form id="form_products" action="#" method="POST" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="" class="form-horizontal group-border-dashed">
                                        <div class="form-group no-padding">
                                            <div class="col-sm-7">
                                                <h3 class="wizard-title" id="title-product">Agregar productos para el cliente</h3>
                                            </div>
                                        </div>


                                        <input  type="text" id="id_venta" name="id_venta" style="display: none;">
                                        <input  type="text" id="id_cliente" name="id_cliente" style="display: none;">
                                        <input  type="text" id="nombre_cliente" name="nombre_cliente" style="display: none;">

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <select id="searchable" name="productos" multiple="multiple">


                                                    @foreach($productos as $producto)


                                                        <option value="{{$producto->id}}">{{$producto->nombre}}</option>



                                                    @endforeach


                                                </select>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Numero de piezas</label><br>

                                            </div>
                                            <div class="row">

                                                <div class="col-sm-5">

                                                    <input name="num_piezas" class="form-control" type="text" placeholder="Separados por una coma ejemplo 1,2,3">
                                                </div>


                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button  class="btn btn-default btn-space wizard-previous disabled">Anterios</button>
                                                <button type="submit" id="product-submit" data-wizard="#wizard1" class="btn btn-primary btn-space wizard-next">Siguiente</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!--no sirve-->
                                <div style="display: none;" class="step-pane">
                                    <form action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="" class="form-horizontal group-border-dashed">
                                        <div class="form-group no-padding">
                                            <div class="col-sm-7">
                                                <h3 class="wizard-title">Total</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label class="control-label" id="credit_slider">Buy Credits: <span id="credits">$30</span></label>



                                                <input style="display: none" id="" type="text" value="30" class="">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Change Plan</label>
                                                <p>Change your plan many times as you want.</p>
                                                <select class="select2">
                                                    <optgroup label="Personal">
                                                        <option value="p1">Basic</option>
                                                        <option value="p2">Medium</option>
                                                    </optgroup>
                                                    <optgroup label="Company">
                                                        <option value="p3">Standard</option>
                                                        <option value="p4">Silver</option>
                                                        <option value="p5">Gold</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label class="control-label">Factura: <span id="rate">5%</span></label>
                                                <p>Puedes ver el pdf de la factura.</p>
                                                <input id="rate_slider" data-slider-min="0" data-slider-max="100" type="text" value="5" class="bslider form-control">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button data-wizard="#wizard1" class="btn btn-default btn-space wizard-previous">Previous</button>
                                                <button data-wizard="#wizard1" class="btn btn-success btn-space wizard-next">Complete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div data-step="3" class="step-pane">
                                    <form action="{{url("/ajaxRequest")}}" id="form_finish" method="POST" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="" class="form-horizontal group-border-dashed">
                                        <div class="form-group no-padding">
                                            <div class="col-sm-7">
                                                <h3 class="wizard-title">Total</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label class="control-label" id="total_doo">Compra: <span id="total_doo">$30</span></label>

                                                <h3 id="exceded_credit" class="wizard-title" >Supero el limite de credito</h3>
                                                <button  id="aceptar"  class="btn btn-success btn-space ">Si</button>

                                                <button  id="rechazar"  class="btn btn-success btn-space ">No</button>



                                            </div>
                                            <input type="text" name="id_user" id="id_user" style="display: none">
                                            <input type="text" name="total_input" id="total_input" style="display: none">
                                            <div class="col-sm-6">
                                                <label class="control-label">Forma de pago</label>
                                                <p>Elige la forma de pago.</p>
                                                <select class="select2" name="forma_pago" id="forma_pago">
                                                    <optgroup label="Pago">
                                                        <option value="contado">Contado</option>
                                                        <option value="cuenta">Cuenta</option>
                                                    </optgroup>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label class="control-label">Factura</label>
                                                <p>Puedes ver la factura en pdf.</p>
                                                <a id="facturar" href="#" target="_blank" class="btn btn-outline-primary">Factura</a>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button data-wizard="#wizard1"  class="btn btn-default btn-space wizard-previous disabled">Anterior</button>
                                                <button type="submit" id="submit_finish"  class="btn btn-success btn-space wizard-next">Completar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
<script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/lib/fuelux/js/wizard.js" type="text/javascript"></script>
<script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
<script src="assets/js/app-form-wizard.js" type="text/javascript"></script>
<script src="{{url("/js/posts-ajax.js")}}"></script>

<script src="http://foxythemes.net/preview/products/beagle/assets/lib/multiselect/js/jquery.multi-select.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/quicksearch/jquery.quicksearch.min.js" type="text/javascript"></script>




<script src="http://foxythemes.net/preview/products/beagle/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/js/app.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/multiselect/js/jquery.multi-select.js" type="text/javascript"></script>
<script src="http://foxythemes.net/preview/products/beagle/assets/lib/quicksearch/jquery.quicksearch.min.js" type="text/javascript"></script>




<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.wizard();
        App.formMultiselect();

    });
</script>
</body>
</html>