<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 24/08/2018
 * Time: 05:33 PM
 */
?>
<?php
if($this->session->flashdata('correcto'))?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Nuevo Usuario</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="consultaUsuario">Consulta</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <strong>Datos Usuario</strong>
                    </div>
                    <div class="card-body card-block">
                        <div><label for='text-input' class='form-control-label' > Todos los datos son requeridos.</label></div>                       
                        <?php
                            //Mensajes de error
                            if($this->session->flashdata('Creado')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Usuario creado correctamente.</label></div>";
                            }else{if($this->session->flashdata('No')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Datos no ingresados.</label></div>";
                            }
                            }
                            if($this->session->flashdata('Error')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Consultar administrador.</label></div>";
                            }
                            echo validation_errors();
                        ?>
                        <br>
                        <form action="insertaU" method="post" enctype="multipart/form-data" class="form-horizontal" id="target"><!-- route de la función que inserta los datos //insertaU--->
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre</label></div>
                                <div class="col-12 col-md-12"><input type="text" id="text-input" name="name" placeholder="" class="form-control" value="<?php echo set_value('name'); ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Apellido Paterno</label></div>
                                <div class="col-12 col-md-12"><input type="text" id="text-input" name="app" placeholder="" class="form-control" value="<?php echo set_value('app'); ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Apellido Materno</label></div>
                                <div class="col-12 col-md-12"><input type="text" id="text-input" name="apm" placeholder="" class="form-control" value="<?php echo set_value('apm');?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Usuario</label></div>
                                <div class="col-12 col-md-12"><input type="text" id="text-input" name="user" placeholder="" class="form-control" value="<?php echo set_value('user');?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Contraseña</label></div>
                                <div class="col-12 col-md-12"><input type="password" id="text-input" name="password" placeholder="" class="form-control" value="<?php echo set_value('password');?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Repetir Contraseña</label></div>
                                <div class="col-12 col-md-12"><input type="password" id="text-input" name="passwordr" placeholder="" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Activo</label></div>
                                <div class="col col-md-12">
                                    <div class="form-check">
                                        <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label ">
                                                <input type="radio" id="radio1" name="activo" value="1" class="form-check-input" checked>Activo
                                            </label>
                                        </div>
                                        <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label ">
                                                <input type="radio" id="radio2" name="activo" value="0" class="form-check-input">Inactivo
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Tipo de Usuario</label></div>
                                <div class="col-12 col-md-12">
                                    <select name='tipUsuario' id='tipUsuario' class='form-control'>
                                        <?php
                                        foreach ( $tipo as $tipoU) {
                                            echo "<option value='$tipoU->id_tipoUsuario'>".$tipoU->tipoUsuario."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label"> Dependencia</label></div>
                                <div class="col-12 col-md-12">
                                    <select name="dependencia" id="dependencia" class=" form-control">
                                    <?php
                                       foreach ($depen as $dependencia){
                                           echo "<option value='$dependencia->id_dependencias'>".$dependencia->dependencias."</option>";
                                       }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> <!-- card-body-->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" id="target">
                            <i class="fa fa-dot-circle-o"></i> Guardar
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Borrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
