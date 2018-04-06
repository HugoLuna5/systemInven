<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Mini Super Cynthi</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.gritter/css/jquery.gritter.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
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



    <!--Error-->
    @if(session('notificationGroupError'))

        <div class="alert alert-danger" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
            </button>
            <center><strong>{{session('notificationGroupError')}}</strong></center>
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
                            <li><a href="#"><span class="icon mdi mdi-face"></span> Cuenta</a></li>
                            <li><a href="#"><span class="icon mdi mdi-settings"></span> Ajustes</a></li>
                            <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="icon mdi mdi-power"></span> Cerrar sesión</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                </ul>
                <div class="page-title"><span>Agregar Productos</span></div>
                <ul class="nav navbar-nav navbar-right be-icons-nav">
                    <li class="dropdown"><a href="#" role="button" aria-expanded="false" class="be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                        <ul class="dropdown-menu be-notifications">
                            <li>
                                <div class="title">Notifications<span class="badge">3</span></div>
                                <div class="list">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>
                                                <li class="notification notification-unread"><a href="#">
                                                        <div class="image"><img src="assets/img/avatar2.png" alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
                                                        </div></a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img src="assets/img/avatar3.png" alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
                                                        </div></a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img src="assets/img/avatar4.png" alt="Avatar"></div>
                                                        <div class="notification-info">
                                                            <div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
                                                        </div></a></li>
                                                <li class="notification"><a href="#">
                                                        <div class="image"><img src="assets/img/avatar5.png" alt="Avatar"></div>
                                                        <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"> <a href="#">View all notifications</a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
                        <ul class="dropdown-menu be-connections">
                            <li>
                                <div class="list">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/github.png" alt="Github"><span>GitHub</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/bitbucket.png" alt="Bitbucket"><span>Bitbucket</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/slack.png" alt="Slack"><span>Slack</span></a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/dribbble.png" alt="Dribbble"><span>Dribbble</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/mail_chimp.png" alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                                            <div class="col-xs-4"><a href="#" class="connection-item"><img src="assets/img/dropbox.png" alt="Dropbox"><span>Dropbox</span></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"> <a href="#">More</a></div>
                            </li>
                        </ul>
                    </li>
                </ul>
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
                            <li class="parent"><a href="charts.html"><i class="icon mdi mdi-chart-donut"></i><span>Estadisticas</span></a>
                                <ul class="sub-menu">
                                    <li><a href="charts-flot.html">Flot</a>
                                    </li>
                                    <li><a href="charts-sparkline.html">Sparklines</a>
                                    </li>
                                    <li><a href="charts-chartjs.html">Chart.js</a>
                                    </li>
                                    <li><a href="charts-morris.html">Morris.js</a>
                                    </li>
                                </ul>
                            </li>
                            <li ><a href="#"><i class="icon mdi mdi-dot-circle"></i><span>Proveedores</span></a>

                            </li>
                            <li  class="parent"><a href="#"><i class="icon mdi mdi-border-all"></i><span>Productos</span></a>
                                <ul class="sub-menu">
                                    <li><a href="{{url("/products")}}">Productos</a>
                                    </li>
                                    <li class="active"><a href="{{url("/add-product")}}">Agregar producto</a>
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
            <ol class="breadcrumb page-head-nav">
                <li><a href="{{url("/products/exist")}}">Productos</a></li>
                <li class="active">Agregar</li>

            </ol>
        </div>
        <div class="main-content container-fluid">

            <!--Sizing-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider">Agregar un cliente<span class="panel-subtitle">Rellena los campos para crear tu producto</span></div>
                        <div class="panel-body">
                            <form action="{{url("/add-product")}}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre del producto</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nombre" autocomplete="off" class="form-control input-lg">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Precio</label>
                                    <div class="col-sm-6">

                                        <div class="input-group xs-mb-15"><span class="input-group-addon">$</span>
                                            <input type="text" name="precio" class="form-control"><span class="input-group-addon">.00</span>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Código de barras</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="codigo"  class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Categoria</label>
                                    <div class="col-sm-6">
                                        <select class="select2" name="categoria">
                                            <optgroup label="ABARROTES">
                                                <option value="Aceite comestibles">Aceite comestibles</option>
                                                <option value="HAderezosI">Aderezos</option>
                                                <option value="HIConsome">Consome</option>
                                                <option value="Crema de cacahuate">Crema de cacahuate</option>
                                                <option value="Crema para café">Crema para café</option>
                                                <option value="Pure de tomate">Pure de tomate</option>
                                                <option value="Alimento para bebe">Alimento para bebe</option>
                                                <option value="Alimento para mascotas">Alimento para mascotas</option>
                                                <option value="Atole">Atole</option>
                                                <option value="Avena">Avena</option>
                                                <option value="Azúcar">Azúcar</option>
                                                <option value="Café">Café</option>
                                                <option value="Cereales">Cereales</option>
                                                <option value="Chile piquín">Chile piquín</option>
                                                <option value="Especias">Especias</option>
                                                <option value="Flan en polvo">Flan en polvo</option>
                                                <option value="Formulas infantiles">Formulas infantiles</option>
                                                <option value="Gelatinas en polvo/Grenetina">Gelatinas en polvo/Grenetina</option>
                                                <option value="Harina">Harina</option>
                                                <option value="Harina preparada">Harina preparada</option>
                                                <option value="Mole">Mole</option>
                                                <option value="Sal">Sal</option>
                                                <option value="Salsas envasadas">Salsas envasadas</option>
                                                <option value="Sazonadores">Sazonadores</option>
                                                <option value="Sopas en sobre">Sopas en sobre</option>
                                                <option value="Cajeta">Cajeta</option>
                                                <option value="Catsup">Catsup</option>
                                                <option value="Mayonesa">Mayonesa</option>
                                                <option value="Mermelada">Mermelada</option>
                                                <option value="Miel">Miel</option>
                                                <option value="Te">Te</option>
                                                <option value="Vinagre">Vinagre</option>
                                                <option value="Huevo">Huevo</option>
                                                <option value="Pastas">Pastas</option>d
                                            </optgroup>
                                            <optgroup label="ENLATADOS">
                                                <option value="Aceitunas">Aceitunas</option>
                                                <option value="Champiñones enteros/rebanados">Champiñones enteros/rebanados</option>
                                                <option value="Chícharo con zanahoria">Chícharo con zanahoria</option>
                                                <option value="Chícharos enlatados">Chícharos enlatados</option>
                                                <option value="Frijoles enlatados">Frijoles enlatados</option>
                                                <option value="Frutas en almíbar">Frutas en almíbar</option>
                                                <option value="Sardinas">Sardinas</option>
                                                <option value="Atún en agua/aceite">Atún en agua/aceite</option>
                                                <option value="Chiles enlatados">Chiles enlatados</option>
                                                <option value="Chiles envasados">Chiles envasados</option>
                                                <option value="Ensaladas enlatadas">Ensaladas enlatadas</option>
                                                <option value="Granos de elote enlatados">Granos de elote enlatados</option>
                                                <option value="Sopa en lata">Sopa en lata</option>
                                                <option value="Vegetales en conserva">Vegetales en conserva</option>


                                            </optgroup>
                                            <optgroup label="LÁCTEOS">
                                                <option value="Leche condesada">Leche condesada</option>
                                                <option value="Leche deslactosada">Leche deslactosada</option>
                                                <option value="Leche en polvo">Leche en polvo</option>
                                                <option value="Leche evaporada">Leche evaporada</option>
                                                <option value="Leche light">Leche light</option>
                                                <option value="Leche pasteurizada">Leche pasteurizada</option>
                                                <option value="Leche saborizada">Leche saborizada</option>
                                                <option value="Leche semidescremada">Leche semidescremada</option>
                                                <option value="Crema">Crema</option>
                                                <option value="Yoghurt">Yoghurt</option>
                                                <option value="Mantequilla">Mantequilla</option>
                                                <option value="Margarina">Margarina</option>
                                                <option value="Media crema">Media crema</option>
                                                <option value="Queso">Queso</option>

                                            </optgroup>
                                            <optgroup label="BOTANAS">
                                                <option value="Papas">Papas</option>
                                                <option value="Palomitas">Palomitas</option>
                                                <option value="Frituras de maíz">Frituras de maíz</option>
                                                <option value="Cacahuates">Cacahuates</option>
                                                <option value="Botanas saladas">Botanas saladas</option>
                                                <option value="Barras alimenticias">Barras alimenticias</option>
                                                <option value="Nueces y semillas">Nueces y semillas</option>
                                                <option value="Sabritas">Sabritas</option>
                                                <option value="Barcel">Barcel</option>

                                            </optgroup>
                                            <optgroup label="CONFITERÍA">
                                                <option value="Caramelos">Caramelos</option>
                                                <option value="Dulces enchilados">Dulces enchilados</option>
                                                <option value="Chocolate de mesa">Chocolate de mesa</option>
                                                <option value="Chocolate en polvo
">Chocolate en polvo
                                                </option>
                                                <option value="Chocolates">Chocolates</option>
                                                <option value="Gomas de mascar">Gomas de mascar</option>
                                                <option value="Mazapán">Mazapán</option>
                                                <option value="Malvaviscos">Malvaviscos</option>
                                                <option value="Pulpa de tamarindo">Pulpa de tamarindo</option>
                                                <option value="Pastillas de dulce">Pastillas de dulce</option>
                                                <option value="Paletas de dulce">Paletas de dulce</option>

                                            </optgroup>


                                            <optgroup label="HARINAS">

                                                <option value="Tortillas de harina/maíz">Tortillas de harina/maíz</option>
                                                <option value="Galletas dulces">Galletas dulces</option>
                                                <option value="Galletas saladas">Galletas saladas</option>
                                                <option value="Pastelillos">Pastelillos</option>
                                                <option value="Pan de caja">Pan de caja</option>
                                                <option value="Pan dulce">Pan dulce</option>
                                                <option value="Pan molido">Pan molido</option>
                                                <option value="Pan tostado">Pan tostado</option>
                                            </optgroup>



                                            <optgroup label="FRUTAS Y VERDURAS">
                                                <option value="Aguacates">Aguacates</option>
                                                <option value="Ajos">Ajos</option>
                                                <option value="Cebollas">Cebollas</option>
                                                <option value="Chiles">Chiles</option>
                                                <option value="Cilantro/Perejil">Cilantro/Perejil</option>
                                                <option value="Jitomate">Jitomate</option>
                                                <option value="Papas">Papas</option>
                                                <option value="Limones">Limones</option>
                                                <option value="Manzanas">Manzanas</option>
                                                <option value="Naranjas">Naranjas</option>
                                                <option value="Plátanos">Plátanos</option>

                                            </optgroup>

                                            <optgroup label="BEBIDAS">
                                                <option value="Agua mineral">Agua mineral</option>
                                                <option value="Agua natural">Agua natural</option>
                                                <option value="Agua saborizada">Agua saborizada</option>
                                                <option value="Jarabes">Jarabes</option>
                                                <option value="Jugos/Néctares">Jugos/Néctares</option>
                                                <option value="Naranjadas">Naranjadas</option>
                                                <option value="Bebidas de soya">Bebidas de soya</option>
                                                <option value="Bebidas en polvo">Bebidas en polvo</option>
                                                <option value="Bebidas infantiles">Bebidas infantiles</option>
                                                <option value="Bebidas isotónicas">Bebidas isotónicas</option>
                                                <option value="Energetizantes">Energetizantes</option>
                                                <option value="Isotónicos">Isotónicos</option>
                                                <option value="Refrescos">Refrescos</option>
                                            </optgroup>


                                            <optgroup label="BEBIDAS ALCOHÓLICAS">
                                                <option value="Bebidas preparadas">Bebidas preparadas</option>
                                                <option value="Cerveza">Cerveza</option>
                                                <option value="Anís">Anís</option>
                                                <option value="Brandy">Brandy</option>
                                                <option value="Ginebra">Ginebra</option>
                                                <option value="Cordiales">Cordiales</option>
                                                <option value="Mezcal">Mezcal</option>
                                                <option value="Jerez">Jerez</option>
                                                <option value="Ron">Ron</option>
                                                <option value="Tequila">Tequila</option>
                                                <option value="Sidra">Sidra</option>
                                                <option value="Whiskey">Whiskey</option>
                                                <option value="Vodka">Vodka</option>
                                            </optgroup>

                                            <optgroup label="ALIMENTOS PREPARADOS">
                                                <option value="Pastas listas para comer">Pastas listas para comer</option>
                                                <option value="Sopas en vaso">Sopas en vaso</option>
                                            </optgroup>

                                            <optgroup label="CARNES Y EMBUTIDOS">
                                                <option value="Salchicha">Salchicha</option>
                                                <option value="Mortadela">Mortadela</option>
                                                <option value="Tocino">Tocino</option>
                                                <option value="Jamón">Jamón</option>
                                                <option value="Manteca">Manteca</option>
                                                <option value="Chorizo">Chorizo</option>
                                                <option value="Carne de puerco/res/pollo">Carne de puerco/res/pollo</option>
                                            </optgroup>

                                            <optgroup label="AUTOMEDICACIÓN">
                                                <option value="Suero">Suero</option>
                                                <option value="Agua oxigenada">Agua oxigenada</option>
                                                <option value="Preservativos">Preservativos</option>
                                                <option value="Alcohol">Alcohol</option>
                                                <option value="Gasas">Gasas</option>
                                                <option value="Analgésicos">Analgésicos</option>
                                                <option value="Antigripales">Antigripales</option>
                                                <option value="Antiácidos">Antiácidos</option>
                                            </optgroup>

                                        </select>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Total de piezas</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="piezas" class="form-control input-lg">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-7">
                                        <input type="submit" class="btn btn-rounded btn-space btn-success btn-xl" value="Agregar producto">
                                    </div>
                                </div>
                            </form>
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
<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
<script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
<script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
<script src="assets/js/app-form-elements.js" type="text/javascript"></script>
<script src="assets/js/app-ui-notifications.js" type="text/javascript"></script>
<script src="assets/lib/jquery.gritter/js/jquery.gritter.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.formElements();
        App.uiNotifications();
    });
</script>
</body>
</html>