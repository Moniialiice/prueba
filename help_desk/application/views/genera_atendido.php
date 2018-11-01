<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Oficio Seguimiento Atendido</h1>
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
                        <strong>Datos Oficio Seguimiento Atendido</strong>
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
                        <form action="insertarAtendido" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Oficio Seguimiento</label></div>
                                    <?php
                                        //echo date('l jS \of F Y h:i:s A');
                                    //oficio entrada e id
                                        foreach ($datos as $dato)
                                        {
                                            echo "<div class='col-12 col-md-9'>
                                            <input type='text' id='text-input' value='".$dato->nomenclatura."' class='form-control' disabled>
                                            <input type='text' id='text-input' name='segui' value='".$dato->id_oficioseg."' hidden>
                                            </div>";
                                        }
                                        
                                    ?>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha Atendido</label></div>
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
                                <div class="col col-md-3"><label for="text-input" class="form-control-label">  Asunto</label></div>
                                <div class="col-12 col-md-9"><textarea name="asunto" id="textarea-input" OnKeyUp="Upper(this);" rows="5" class="form-control"><?php echo set_value('asunto'); ?></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Nombre</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" OnKeyUp="Upper(this);" name="nombre" placeholder="" class="form-control" value="<?php echo set_value('nombre'); ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Cargo</label></div>
                                <div class="col-12 col-md-9"><textarea name="cargo" id="textarea-input" OnKeyUp="Upper(this);" rows="1" placeholder="" class="form-control"><?php echo set_value('cargo'); ?></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Descrición del Oficio</label></div>
                                <div class="col-12 col-md-9"><textarea name="descripcion" id="textarea-input" OnKeyUp="Upper(this);" rows="5" class="form-control"><?php echo set_value('descripcion'); ?></textarea></div>
                            </div>
                            <div><label for='text-input' class='form-control-label fa fa-exclamation' > Nombre de archivo sin ningun tipo de carácter (/,$,(),-,#)</label></div><br>
                            <div class="row form-group">
                                 <div class="col col-md-3"><label for="file-input" class="form-control-label"> Archivo Atendido</label></div>
                                 <div class="col-12 col-md-9"><input id="file-input" name="archivo" class="form-control-file" type="file" ></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Con copia a </label></div>
                                <div class="col-12 col-md-9"><textarea name="copia" id="textarea-input" OnKeyUp="Upper(this);" rows="3" class="form-control"><?php echo set_value('copia'); ?></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Atención</label></div>
                                <?php
                                //se toman los datos del usuario de las sesiones
                                    $id = $this->session->userdata('id_usuario');
                                    $nom = $this->session->userdata('name');
                                    echo "<div class='col-12 col-md-9'><input type='text' id='text-input' class='form-control' value='".$nom."' disabled>
                                          <input type='text' id='text-input' name='atencion' value='".$id."' hidden>
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