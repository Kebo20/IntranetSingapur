<?php
session_start();
//require_once('CADO/ClaseCaja.php');
if (!isset($_SESSION['S_user'])) {
    header("location:index.php");
    exit;
}

date_default_timezone_set('America/Lima');
//$ocaja=new Cajas();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>SISLAB</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/chosen.min.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
        <!--<link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />-->

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="assets/js/ace-extra.min.js"></script>
        <script src="js/ValidarLetrasNumeros.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->


    </head>

    <body class="no-skin">

        <div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <div class="navbar-header pull-left"> <br>
                    <b style="color:#FFF">Bienvenido : <span id="LblIdUser"><?= $_SESSION['S_user']; ?></span></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b style="color:#FFF">Fecha : <?= date('d/m/Y') ?></b>       
                    <a href="Panel.php" class="navbar-brand">
                            <!--<img src="imagenes/logo.png" height="20" width="150">-->
                    </a>
                    <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
                        <span class="sr-only">Toggle sidebar</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>
                    </button>

                </div>

                <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
                    <ul class="nav ace-nav">

                        <li class="light-blue dropdown-modal user-min">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Bienvenido,</small>
                                    <?= $_SESSION['S_user']; ?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <!--<li>
                                        <a href="#">
                                                <i class="ace-icon fa fa-cog"></i>
                                                Settings
                                        </a>
                                </li>-->

                                <!--<li>
                                        <a href="profile.html">
                                                <i class="ace-icon fa fa-user"></i>
                                                Perfil
                                        </a>
                                </li>-->

                                <!--<li class="divider"></li>-->

                                <li>
                                    <a href="index.php">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Salir
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')
                    } catch (e) {
                    }
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"  ></span>

                        <span class="btn btn-info"  ></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->


                <ul class="nav nav-list" id="IdMenu" style="margin:0; padding:0">
                    <li class="hover" id="1" onClick="Activar('1');">

                        <a href="#" class="dropdown-toggle" >
                            <i class="menu-icon"><img src="imagenes/grupo_user.png" style="border:0"  height="25" width="25" ></i>
                            <span class="menu-text" style="font-size:10px; font-weight:bold" > CONFIGURACION </span>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">

                            <li class="hover" id="2" onClick="Activar('1');GrupoUsuarios()">
                                <a href="#">
                                    <i  style="margin:0; padding:0" class="menu-icon fa fa-caret-right"></i>
                                    <span class="menu-text" style="font-size:10px; margin:0; padding:0; font-weight:bold"> GRUPO USUARIOS </span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="hover" id="3" onClick="Activar('1');Usuarios()">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right" style="margin:0; padding:0"></i>
                                    <span class="menu-text" style="font-size:10px; margin:0; padding:0; font-weight:bold"> USUARIOS </span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="hover" id="4" onClick="Activar('1');Series()">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right" style="margin:0; padding:0"></i>
                                    <span class="menu-text" style="font-size:10px; margin:0; padding:0; font-weight:bold"> SERIES DOC. </span>
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover" id="5" onClick="Activar('1');Empresas()">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right" style="margin:0; padding:0"></i>
                                    <span class="menu-text" style="font-size:10px; margin:0; padding:0; font-weight:bold">EMPRESAS </span>
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover" id="" onClick="Activar('1');Sucursales()">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right" style="margin:0; padding:0"></i>
                                    <span class="menu-text" style="font-size:10px; margin:0; padding:0; font-weight:bold">SUCURSALES</span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="hover" id="" onClick="Activar('1');Servicios()">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right" style="margin:0; padding:0"></i>
                                    <span class="menu-text" style="font-size:10px; margin:0; padding:0; font-weight:bold">SERVICIOS</span>
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li> 


                    <li class="hover" id="6" onClick="Activar('6');">
                        <a href="#" class="dropdown-toggle" >
                            <i class="menu-icon"><img src="imagenes/pdf.png" style="border:0"  height="25" width="25" ></i>
                            <span class="menu-text" style="font-size:10px; font-weight:bold" > REPORTES </span>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li class="hover" id="7" onClick="Activar('6');">
                                <a href="#">
                                    <i  style="margin:0; padding:0" class="menu-icon fa fa-caret-right"></i>
                                    <span class="menu-text" style="font-size:10px; font-weight:bold"> REPORTE 1 </span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="hover" id="8" onClick="Activar('6');">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right" style="margin:0; padding:0"></i>
                                    <span class="menu-text" style="font-size:10px; font-weight:bold">REPORTE 2</span>
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="hover" id="9" onClick="Activar('6');">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right" style="margin:0; padding:0"></i>
                                    <span class="menu-text" style="font-size:10px; font-weight:bold">REPORTE 3</span>
                                </a>

                                <b class="arrow"></b>
                            </li>



                        </ul>

                    </li>

                </ul>	
            </div>

            <div class="main-content" >
                <div class="main-content-inner">
                    <div class="page-content" ><!-- /.page-header -->

                        <div class="row" >
                            <div class="col-xs-12">


                                <!-- INICIO CUERPO -->  <div id="IdCuerpo">

                                </div> <!-- FIN CUERPO-->


                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

        </div><!-- /.main-container -->



        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
                                if ('ontouchstart' in document.documentElement)
                                    document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
                                function Empresas() {

                                    $.post('Adm_Empresa.php', {}, function (datitos) {
                                        $("#IdCuerpo").html(datitos);
                                    })
                                }
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/js/chosen.jquery.min.js"></script>
        <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/js/jquery.sparkline.index.min.js"></script>
        <script src="assets/js/jquery.flot.min.js"></script>
        <script src="assets/js/jquery.flot.pie.min.js"></script>
        <script src="assets/js/jquery.flot.resize.min.js"></script>

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
        <script src="js/Panels.js"></script>
        <!--<script src="assets/js/jquery.gritter.min.js"></script>-->
        <!-- DataTables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
        <!--SELECT2 -->


        <link href="js/select2.min.css" rel="stylesheet" type="text/css" />
        <script src="js/select2.full.min.js" type="text/javascript"></script>




        <input type="hidden" id="IdActivo" >
        <input type="hidden" id="User" value="<?= $_SESSION['S_user'] ?>" >		
        <input type="hidden" id="HiCaja" value="<?= $_SESSION['S_caja'] ?>" >
        <input type="hidden" id="HiCodIngreso" value="<?= $_SESSION['S_cod_ingreso'] ?>" >

        <div id="IdCargando" class="overlay" style="display:none" >
            <div id="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="lading"></div>
            </div>
        </div> 


