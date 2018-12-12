<div class='breadcrumbs'>
    <div class='col-sm-4'>
        <div class='page-header float-left'>
            <div class='page-title'>
                <h1>Perfil de Usuario</h1>
            </div>
        </div>
    </div>
    <div class='col-sm-8'>
        <div class='page-header float-right'>
            <div class='page-title'>
                <ol class='breadcrumb text-right'>
                    <li><a href="#"></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class='content mt-3'>
    <div class='animated fadeIn'>
        <div class='row'>
            <div class='col-lg-9'>
                <div class='card'>
                    <div class='card-header'>
                        <strong>Mis Datos </strong>
                    </div>
                    <div class='card-body card-block'>
                        <?php
                            //Mensajes
                            if($this->session->flashdata('Modificado')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Datos modificados correctamente.</label></div>";
                            }else{if($this->session->flashdata('No')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Datos no modificados.</label></div>";
                            }
                            }if($this->session->flashdata('Error')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Consultar administrador.</label></div>";
                            }
                            echo validation_errors();
                        ?>
                        <br>
                        <form action='actializaMisDatos' method='post' enctype='multipart/form-data' class='form-horizontal'>
                            <?php
                            foreach ($usuario as $dato){
                                echo "
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Nombre</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='name' class='form-control' value='".$dato->nombre."' disabled></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='id' hidden class='form-control' value='".$dato->id_usuario."'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Apellido Paterno</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='app' class='form-control' value='".$dato->apellidop."' disabled></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Apellido Materno</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='apm' class='form-control' value='".$dato->apellidom."' disabled></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Correo Electrónico</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='email' class='form-control' value='".$dato->correo."' disabled></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Contraseña</label></div>
                                        <div class='col-12 col-md-9'><input type='password' id='text-input' name='password' class='form-control' value='".$dato->password."' disabled></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Nueva Contraseña</label></div>
                                        <div class='col-12 col-md-9'><input type='password' id='text-input' name='newps' class='form-control'></div>
                                    </div>   
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Repetir Nueva Contraseña</label></div>
                                        <div class='col-12 col-md-9'><input type='password' id='text-input' name='newpsr' class='form-control'></div>
                                    </div>";
                              echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label for='remite' class='form-control-label'>Tipo de Usuario</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='tipUsuario' class='form-control' value='".$dato->tipoUsuario."' disabled></div>
                                    
                                    </div>
                                      </div>";
                            }
                            ?>
                    </div> <!-- card-body-->
                    <div class='card-footer'>
                        <button type='submit' class='btn btn-primary btn-sm'>
                            <i class='fa fa-dot-circle-o'></i> Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

