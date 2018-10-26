<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 28/08/2018
 * Time: 12:55 PM
 */?>


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Oficio Recepción</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href=""></a></li>
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
                        <strong>Datos Oficio Recepción</strong>
                    </div>
                    <div class="card-body card-block">
                        <?php
                            //Mensajes
                            if($this->session->flashdata('Creado')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Oficio recepción creado correctamente.</label></div>";
                            }
                            if($this->session->flashdata('No')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Oficio recepción no creado.</label></div>";                            
                            }
                            if($this->session->flashdata('Error')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Datos no recibidos</label></div>";
                            }
                                echo validation_errors();    
                        ?>
                        <div><label for='text-input' class='form-control-label' > Todos los datos son requeridos.</label></div>
                        <form action="insertaEntrada" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" required> No. de Oficio</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="no_oficio" class="form-control" value="<?php echo set_value('no_oficio'); ?>" ></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha Recepción</label></div>
                                <div class="col-12 col-md-9">
                                    <div class='input-group' >                                        
                                        <input type='text-input' class="form-control" id="datepicker" name="fecha" value="<?php echo set_value('fecha'); ?>">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Hora Recepción</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="hora" placeholder="" class="form-control" value="<?php echo set_value('hora'); ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha Real</label></div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">                                        
                                        <input type="text-input" class="form-control" id="datepickerf" name="fecha_real" value="<?php echo set_value('fecha_real'); ?>">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Firma Origen</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="firma" placeholder="" class="form-control" value="<?php echo set_value('firma'); ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Cargo</label></div>
                                <div class="col-12 col-md-9"><textarea name="cargo" id="textarea-input" rows="1" placeholder="" class="form-control"><?php echo set_value('cargo'); ?></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Peticion</label></div>
                                <div class="col-12 col-md-9"><textarea name="peticion" id="textarea-input" rows="5" placeholder="" class="form-control"><?php echo set_value('peticion'); ?></textarea></div>
                            </div>
                            <div><label for='text-input' class='form-control-label fa fa-exclamation' > Archivo sin ningun tipo de carácter (/,$,(),-,#)</label></div><br>
                            <div class="row form-group">
                                 <div class="col col-md-3"><label for="file-input" class="form-control-label"> Archivo Entrada</label></div>
                                 <div class="col-12 col-md-9"><input id="file-input" name="entrada" class="form-control-file" type="file" ></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Atención</label></div>
                                <?php
                                //se toman los datos del usuario de las sesiones
                                    $id = $this->session->userdata('id_usuario');
                                    $nom = $this->session->userdata('name');
                                    echo "<div class='col-12 col-md-9'><input type='text' id='text-input' class='form-control' value='".$nom."' disabled>
                                          <input type='text' id='text-input' name='id' value='".$id."' hidden>
                                          </div>";?>
                           </div>
                        <!--/form-->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
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
</div>