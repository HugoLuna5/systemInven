<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mini Super Cynthi</title>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/material-design-icons/css/material-design-iconic-font.min.css")}}"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{url("assets/css/style.css")}}" type="text/css"/>
</head>
<body>
<div class="be-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
            <div class="navbar-header"><a href="{{url("/")}}" class="navbar-brand"></a></div>
            <div class="be-right-navbar">
                <ul class="nav navbar-nav navbar-right be-user-nav">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{url("assets/img/avatar2.png")}}" alt="Avatar"><span class="user-name">{{Auth::user()->name}}</span></a>
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
            <h2 class="page-head-title">Factura</h2>
            <ol class="breadcrumb">
                <li><a href="#">Movimientos</a></li>
                <li><a href="#">Ventas</a></li>
                <li class="active">Factura</li>
            </ol>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice">
                        <div class="row invoice-header">
                            <div class="col-xs-4">
                                <div class="invoice-logo"></div>
                            </div>
                            <div class="col-xs-8 invoice-order"><span class="invoice-id">Factura #{{$md5}}</span><span class="incoice-date"> {{$fecha}}</span></div>
                        </div>
                        <div class="row invoice-data">
                            <div class="col-xs-5 invoice-person"><span class="name">Mini Super Cynthi</span><span>Administrador</span><span>hugo@lunainc.com.mx</span><span>323 H. Galeana</span><span> Tantoyuca, Ver. México</span></div>
                            <div class="col-xs-2 invoice-payment-direction"><i class="icon mdi mdi-chevron-right"></i></div>
                            <div class="col-xs-5 invoice-person"><span class="name">{{$cliente->nombre}}</span><span>Consumidor</span><span>{{$cliente->correo}}</span><span>{{$cliente->direccion}}</span><span>{{$cliente->telefono}}</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="invoice-details">
                                    <tr>
                                        <th style="width:60%">Descripción</th>
                                        <th style="width:17%" class="hours">Cantidad</th>
                                        <th style="width:15%" class="amount">Total</th>
                                    </tr>
                                    @foreach($compras as $compra)

                                        <tr>
                                            <td class="description">{{$compra->producto}}<br>Fehca de compra: {{$compra->created_at}}<br>Precio C/U: {{$compra->precio/$compra->piezas}}</td>
                                            <td class="hours">{{$compra->piezas}}</td>
                                            <td class="amount">${{$compra->precio}}</td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 invoice-payment-method"><span class="title">Metodo de pago</span><span>Contado/Credito</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 invoice-message"><span class="title">Gracias por la compra</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis massa nisl. Sed fringilla turpis id mi ultrices, et faucibus ipsum aliquam. Sed ut eros placerat, facilisis est eu, congue felis.</p>
                            </div>
                        </div>
                        <div class="row invoice-company-info">
                            <div class="col-sm-6 col-md-2 logo"><img src="{{url("assets/img/logo-symbol.png")}}" alt="Logo-symbol"></div>
                            <div class="col-sm-6 col-md-4 summary"><span class="title">Mini Super Cynthi</span>
                                <p>Tenemos de todo. </p>
                            </div>
                            <div class="col-sm-6 col-md-3 phone">
                                <ul class="list-unstyled">
                                    <li>+1(535)-8999278</li>
                                    <li>+1(656)-3558302</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-3 email">
                                <ul class="list-unstyled">
                                    <li>hugo@lunainc.com.mx</li>
                                    <li>hugo@lunainc.com.mx</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row invoice-footer">
                            <div class="col-md-12">
                                <button href="#" class="btn btn-lg btn-space btn-default" onclick="window.print();">Guardad como PDF</button>
                                <button class="btn btn-lg btn-space btn-default" onclick="window.print();">Imprimir</button>
                                <button class="btn btn-lg btn-space btn-primary">Compartir</button>
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
<script src="{{url("assets/lib/jquery/jquery.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/js/main.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/bootstrap/dist/js/bootstrap.min.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });

</script>
</body>
</html>