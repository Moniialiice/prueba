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
                            <h3 class='menu-title'>Oficios</h3><!-- /.menu-title -->
                            <li class='menu-item-has-children dropdown'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-file'></i>Oficio</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaOficio'>Consulta Oficio</a></li>
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
                            <h3 class='menu-title'>Oficios</h3><!-- /.menu-title -->
                            <li class='menu-item-has-children dropdown'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-file'></i>Oficio</a>
                                <ul class='sub-menu children dropdown-menu'>
                                    <li><i class='menu-icon fa fa-list-alt'></i><a href='consultaOficio'>Consulta Oficio</a></li>
                                </ul>
                            </li>
                        </ul>
                      </div><!-- /.navbar-collapse -->";

                            }if($id == 3){
                                echo "
                                <!--div main menu collapse -->
                                <div id='main-menu' class='main-menu collapse navbar-collapse'>
                                <ul class='nav navbar-nav'>                    <!--h3 class='menu-title'>UI elements</h3><!-- /.menu-title -->    
                                    <h3 class='menu-title'>Oficio Recepción</h3><!-- /.menu-title -->
                                    <li class='menu-item-has-children dropdown'>
                                        <a href='' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <i class='menu-icon ti-file'></i>Oficio</a>
                                        <ul class='sub-menu children dropdown-menu'>
                                            <li><i class='menu-icon fa ti-file'></i><a href='nuevaEntrada'>Oficio Recepción</a></li>
                                            <li><i class='menu-icon fa ti-files'></i><a href='muestraEntrada'>Consulta Oficio</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->    ";
                        }
 ?>                       