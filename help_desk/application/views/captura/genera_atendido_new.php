<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Oficio Atendido</h1>
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
                        <strong>Datos Oficio</strong>
                    </div>
                    <div class="card-body card-block">
                        <?php
                            //Mensajes
                            if($this->session->flashdata('Creado')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Oficio atendido creado correctamente.</label></div>";
                            }
                            if($this->session->flashdata('No')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Oficio atendido no creado.</label></div>";                            
                            }
                            if($this->session->flashdata('Error')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Datos no recibidos</label></div>";
                            }
                                echo validation_errors();    
                        ?>
                        <div><label for='text-input' class='form-control-label' > Todos los datos son requeridos.</label></div><br>
                        <form action="insertCAtendido" method="post" enctype="multipart/form-data" class="form-horizontal">                                                    
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Número Oficio</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" OnKeyUp="Upper(this);" name="nom" placeholder="" class="form-control" value="<?php echo set_value('nom'); ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha Atendido</label></div>
                                <div class="col-12 col-md-9">
                                    <div class='input-group' >                                        
                                        <input type='text-input' class="form-control" id="date3" name="date3" value="<?php echo set_value('date3'); ?>">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Nombre</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" OnKeyUp="Upper(this);" name="nombre_at" placeholder="" class="form-control" value="<?php echo set_value('nombre_at'); ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Cargo</label></div>
                                <div class="col-12 col-md-9"><textarea name="cargo_at" id="textarea-input" OnKeyUp="Upper(this);" rows="1" placeholder="" class="form-control"><?php echo set_value('cargo_at'); ?></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Descripción del Oficio</label></div>
                                <div class="col-12 col-md-9"><textarea name="descripcion_at" id="textarea-input" rows="5" class="form-control"><?php echo set_value('descripcion_at'); ?></textarea></div>
                            </div>
                            <div><label for='text-input' class='form-control-label fa fa-exclamation' > Nombre de archivo sin ningun tipo de carácter (/,$,(),-,#)</label></div><br>
                            <div class="row form-group">
                                 <div class="col col-md-3"><label for="file-input" class="form-control-label"> Archivo Atendido</label></div>
                                 <div class="col-12 col-md-9"><input id="file-input" name="archivo" class="form-control-file" type="file" ></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Con copia a </label></div>
                                <div class="col-12 col-md-9"><textarea name="copia_at" id="textarea-input" rows="3" class="form-control"><?php echo set_value('copia_at'); ?></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Atención</label></div>
                                <?php
                                //se toman los datos del usuario de las sesiones
                                    $id = $this->session->userdata('id_usuario');
                                    $nom = $this->session->userdata('name');
                                    echo "<div class='col-12 col-md-9'><input type='text' id='text-input' class='form-control' value='".$nom."' disabled>
                                          <input type='text' id='text-input' name='atencion' value='".$id."' hidden>
                                          </div>";
                                ?>
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