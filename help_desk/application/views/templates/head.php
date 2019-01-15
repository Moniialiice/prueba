<?php
if($this->session->flashdata('correcto'))

?>
<!doctype html>
<!--[if lt IE 7]>      <html class='no-js lt-ie9 lt-ie8 lt-ie7' lang=''> <![endif]-->
<!--[if IE 7]>         <html class='no-js lt-ie9 lt-ie8' lang=''> <![endif]-->
<!--[if IE 8]>         <html class='no-js lt-ie9' lang=''> <![endif]-->
<!--[if gt IE 8]><!--> <html class='no-js' lang=''> <!--<![endif]-->
<head>

    <base href='<?php echo $this->config->base_url()?>'>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>SIGO</title>
    <meta name='description' content='Sufee Admin - HTML5 Admin Template'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel='apple-touch-icon' href='apple-icon.png'>
    <link rel='shortcut icon' href='favicon.ico'>

    <link rel='stylesheet' href='assets/css/normalize.css'>
    <link rel='stylesheet' href='assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assets/css/font-awesome.min.css'>
    <link rel='stylesheet' href='assets/css/themify-icons.css'>
    <link rel='stylesheet' href='assets/css/flag-icon.min.css'>
    <link rel='stylesheet' href='assets/css/cs-skin-elastic.css'>
    <!--libreries datepicker -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <!--datepicker-->
    <script>
        $(function Calendario() {
            $( "#date1,#date2,#date3").datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth:true,
                changeYear:true,
                firstDay: 1,
                monthNames: ['Enero', 'Febreo', 'Marzo',
                    'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab']
            });
        });
    </script> 
    <!--link type="text/css" href="assets/css/jquery-ui-1.8.13.custom.css" rel="stylesheet" /-->
    <script type="text/javascript" src="assets/js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui-1.8.14.custom.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="assets/js/jquery.ui.datepicker-es"></script>
    <script>
    $(function(){
            $('#datepicker,#datepickerf,#datepickert').datetimepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth:true,
                changeYear:true,
                firstDay: 1,
                monthNames: ['Enero', 'Febreo', 'Marzo',
                    'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab']
            });
            
        });
    </script>
    <!--jquery-->
    <!--link rel='stylesheet' href='assets/css/bootstrap-select.less'> -->
    <link rel='stylesheet' href='assets/scss/style.css'>
    <!--Carga código javascrip del sistema-->
    <script src="assets/js/query.js"></script>
    <!--libreria js de datepicker-->
    <script type='text/javascript' src='assets/js/bootstrap-datetimepicker.min.js'></script>
    <!---->
    <script type='text/javascript' src='https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js'></script>
</head>
<body>
        <!-- Left Panel -->

    <aside id='left-panel' class='left-panel'>
        <nav class='navbar navbar-expand-sm navbar-default'>

            <div class='navbar-header'>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#main-menu' aria-controls='main-menu' aria-expanded='false' aria-label='Toggle navigation'>
                    <i class='fa fa-bars'></i>
                </button>
                <a class='navbar-brand' href='index'>SIGO</a>
                <a class='navbar-brand hidden' href='index'></a>
            </div>
        <?php
            $id = $this->session->userdata('id_tipoUsuario');
            if($id == 1)
            {
                echo "
                      <!--div main menu collapse -->
                      <div id='main-menu' class='main-menu collapse navbar-collapse'>   
                        <ul class='nav navbar-nav'>                     <!--h3 class='menu-title'>UI elements</h3><!-- /.menu-title -->
                            <h3 class='menu-title'>Oficio Recepción</h3><!-- /.menu-title -->
                            <li class='menu-item-has-children dropdown'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-envelope'></i>Recepción</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa ti-file'></i><a href='nuevaEntrada'>Oficio Recepción</a></li>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaEntrada'>Consulta Oficio</a></li>
                                </ul>
                            </li>
                            <h3 class='menu-title'>Oficio Seguimiento</h3><!-- /.menu-title -->
                            <li class='menu-item-has-children dropdown'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-file'></i>Seguimiento</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaOficio'>Consulta Seguimiento</a></li>
                                </ul>
                            </li>
                            <h3 class='menu-title'>Oficio Atendido</h3>
                            <li class='menu-item-has-children dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-envelope'></i>Atendido</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaAtendido'>Consulta Atendido</a></li>
                                </ul>
                            </li>
                            <h3 class='menu-title'>Captura</h3>
                            <li class='menu-item-has-children dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='flase'><i class='menu-icon ti-list'></i>Captura</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa ti-file'></i><a href='nuevaCaptura'>Alta</a></li>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaCaptura'>Consulta Seguimiento</a></li>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaAtendidoCap'>Consulta Atendido</a></li>
                                </ul>
                            </li>
                            <h3 class='menu-title'>Usuarios</h3>
                            <li class='menu-item-has-children dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-user'></i>Usuario</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa fa-user-plus'></i><a href='nuevoUsuario'>Alta</a></li>
                                    <li><i class='menu-icon fa fa-users'></i><a href='consultaUsuario'>Consulta</a></li>
                                </ul>
                            </li>
                        </ul>
                      </div><!-- /.navbar-collapse -->";
            }if($id == 2)
                {
                    echo "
                      <!--div main menu collapse -->
                      <div id='main-menu' class='main-menu collapse navbar-collapse'>   
                        <ul class='nav navbar-nav'>                     <!--h3 class='menu-title'>UI elements</h3><!-- /.menu-title -->
                            <h3 class='menu-title'>Oficio Recepción</h3><!-- /.menu-title -->
                            <li class='menu-item-has-children dropdown'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-envelope'></i>Recepción</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa ti-file'></i><a href='nuevaEntrada'>Oficio Recepción</a></li>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaEntrada'>Consulta Oficio</a></li>
                                </ul>
                            </li>
                            <h3 class='menu-title'>Oficio Seguimiento</h3><!-- /.menu-title -->
                            <li class='menu-item-has-children dropdown'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-file'></i>Seguimiento</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaOficio'>Consulta Seguimiento</a></li>
                                </ul>
                            </li>
                            <h3 class='menu-title'>Oficio Atendido</h3><!-- /.menu-title -->
                            <li class='menu-item-has-children dropdown'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-envelope'></i>Atendido</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaAtendido'>Consulta Atendido</a></li>
                                </ul>
                            </li>
                        </ul>
                      </div><!-- /.navbar-collapse -->";
                            }if($id == 3){
                                echo "<!--div main menu collapse -->
                                <div id='main-menu' class='main-menu collapse navbar-collapse'>
                                <ul class='nav navbar-nav'>                    <!--h3 class='menu-title'>UI elements</h3><!-- /.menu-title -->    
                                    <h3 class='menu-title'>Oficio Recepción</h3><!-- /.menu-title -->
                                    <li class='menu-item-has-children dropdown'>
                                        <a href='' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-file'></i>Oficio</a>
                                        <ul class='sub-menu children dropdown-menu'>
                                            <li><i class='menu-icon fa ti-file'></i><a href='nuevaEntrada'>Oficio Recepción</a></li>
                                            <li><i class='menu-icon fa fa-list-alt'></i><a href='muestraEntrada'>Consulta Oficio</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->"  ;
                        }if($id == 4){
                            echo " 
                            <!--div main menu collapse -->
                                <div id='main-menu' class='main-menu collapse navbar-collapse'>
                                <ul class='nav navbar-nav'>                    <!--h3 class='menu-title'>UI elements</h3><!-- /.menu-title -->    
                                    <h3 class='menu-title'>Módulo Captura</h3>
                                    <li class='menu-item-has-children dropdown'>
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='flase'><i class='menu-icon ti-list'></i>Captura</a>
                                        <ul class='sub-menu children dropdown-menu'>
                                            <li><i class='menu-icon fa ti-file'></i><a href='nuevaCaptura'>Alta</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->";
                        }if($id == 5){
                            echo " 
                            <!--div main menu collapse -->
                                <div id='main-menu' class='main-menu collapse navbar-collapse'>
                                <ul class='nav navbar-nav'>                    <!--h3 class='menu-title'>UI elements</h3><!-- /.menu-title -->    
                                    <h3 class='menu-title'>Módulo Consulta</h3>
                                    <li class='menu-item-has-children dropdown'>
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='flase'><i class='menu-icon ti-search'></i>Recepción</a>
                                        <ul class='sub-menu children dropdown-menu'>
                                            <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaEntrada'>Consulta Recepción</a></li>
                                        </ul>
                                    </li>
                                    <li class='menu-item-has-children dropdown'>    
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='flase'><i class='menu-icon ti-search'></i>Seguimiento</a>
                                        <ul class='sub-menu children dropdown-menu'>
                                            <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaOficio'>Consulta Seguimiento</a></li>
                                        </ul>
                                    </li>
                                    <li class='menu-item-has-children dropdown'>    
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='flase'><i class='menu-icon ti-search'></i>Atendido</a>
                                        <ul class='sub-menu children dropdown-menu'>
                                            <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaOficio'>Consulta Atendido</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->";
                        }
            ?>
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id='right-panel' class='right-panel'>

        <!-- Header-->
        <header id='header' class='header'>

            <div class='header-menu'>

                <div class='col-sm-7'>
                    <h2>Sistema de Gestión de Oficios</h2>
                    <a id='menuToggle' class='menutoggle pull-left'><i class='fa fa fa-tasks'></i></a>
                </div>
                <div class='col-sm-5'>
                    <div class='user-area dropdown float-right'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <?php echo $name = $this->session->userdata('name'); ?>
                        </a>
                        <div class='user-menu dropdown-menu'>
                            <?php echo "<a class='nav-link' href='misDatos/".$this->session->userdata('id_usuario')."'><i class='fa fa-user'></i>  Mi Perfil</a>"?>
                            <a class='nav-link' href='close'><i class='fa fa-power-off'></i>  Cerrar Sesión</a>
                        </div>                        
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

