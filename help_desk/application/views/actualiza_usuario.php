<div class='breadcrumbs'>
    <div class='col-sm-4'>
        <div class='page-header float-left'>
            <div class='page-title'>
                <h1>Actualizar Usuario</h1>
            </div>
        </div>
    </div>
    <div class='col-sm-8'>
        <div class='page-header float-right'>
            <div class='page-title'>
                <ol class='breadcrumb text-right'>
                    <li><a href='consultaUsuario'>Consulta</a></li>
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
                        <strong>Datos Usuario</strong>
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
                        <form action='actualizaUsuario' method='post' enctype='multipart/form-data' class='form-horizontal'>
                            <?php
                            foreach ($usuario as $dato){
                                echo "
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class='form-control-label'>ID</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='disabled-input' name='id' disabled='disabled' class='form-control' value='".$dato->id_usuario."'></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='id' hidden class='form-control' value='".$dato->id_usuario."'></div>
                                    </div>  
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Nombre</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='name' class='form-control' value='".$dato->nombre."'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Apellido Paterno</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='app' class='form-control' value='".$dato->apellidop."'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Apellido Materno</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='apm' class='form-control' value='".$dato->apellidom."'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Correo Electrónico</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='email' class='form-control' value='".$dato->correo."'></div>
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
                                if($dato->activo !=0 ){
                                    echo " <div class='row form-group'>
                                            <div class='col col-md-3'><label class='form-control-label'>Activo</label></div>
                                            <div class='col col-md-9'>
                                                <div class='form-check'>
                                                    <div class='form-check-inline form-check'>
                                                        <label for='inline-radio1' class='form-check-label '>
                                                            <input type='radio' id='radio1' name='activo' value='1' class='form-check-input' checked>Activo
                                                        </label>
                                                    </div>
                                                    <div class='form-check-inline form-check'>
                                                        <label for='inline-radio1' class='form-check-label '>
                                                            <input type='radio' id='radio2' name='activo' value='0' class='form-check-input'>Inactivo
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                }else {
                                    echo " <div class='row form-group'>
                                            <div class='col col-md-3'><label class=' form-control-label'>Activo</label></div>
                                            <div class='col col-md-9'>
                                                <div class='form-check'>
                                                    <div class='form-check-inline form-check'>
                                                        <label for='inline-radio1' class='form-check-label '>
                                                            <input type='radio' id='radio1' name='activo' value='1' class='form-check-input'>Activo
                                                        </label>
                                                    </div>
                                                    <div class='form-check-inline form-check'>
                                                        <label for='inline-radio1' class='form-check-label '>
                                                            <input type='radio' id='radio2' name='activo' value='0' class='form-check-input' checked>Inactivo
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                }
                                echo "<div class='row form-group'>
                                      <div class='col col-md-3'><label for='remite' class='form-control-label'>Tipo de Usuario</label></div>
                                        <div class='col-12 col-md-9'>
                                            <select name='tipUsuario' id='tipUsuario' class='form-control-sm form-control'>
                                                <option value='".$dato->id_tipoUsuario."'>".$dato->tipoUsuario."</option>";
                                foreach ( $tipu as $tipoU) {
                                    echo "<option value='".$tipoU->id_tipoUsuario."'>".$tipoU->tipoUsuario."</option>";
                                }
                                echo "</select>
                                        </div>
                                      </div>";

                                //Dependencia descomentar combo select, si se agregan más dependencias y comentar la sección siguiente
                               /*echo "<div class='row form-group'>
                                <div class='col col-md-3'><label for='remite' class='form-control-label'> Dependencia</label></div>
                                  <div class='col-12 col-md-9'>
                                      <select name='dependencia' id='dependencia' class='form-control-sm form-control'>
                                          <option value='".$dato->id_dependencias."'>".$dato->dependencias."</option>";
                                foreach ( $dep as $depe) {
                                    echo "<option value='".$depe->id_dependencias."'>".$depe->dependencias."</option>";
                                }
                                echo "</select>
                                        </div>
                                        </div>";*/
                                echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label for='' class='form-control-label'>Dependencia</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='' disabled='disabled' class='form-control' value='".$dato->dependencias."'></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='dependencia' value='".$dato->id_dependencias."' hidden></div>
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

