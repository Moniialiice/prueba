<?php
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1></h1>
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
                        <strong>Datos</strong>
                    </div>
                    <div class="card-body card-block">
                        <?php
                        if($this->session->flashdata('Creado')){
                            echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Oficio recepción creado correctamente.</label></div>";
                        }if($this->session->flashdata('No')){
                            echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Oficio recepción no creado.</label></div>";                            
                        }
                        ?>
                        <ul class="nav nav-tabs" id="Tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="recepcion-tab" data-toggle="tab" href="#recepcion" role="tab" aria-controls="recepcion" aria-selected="true">Recepción</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="seguimiento-tab" data-toggle="tab" href="#seguimiento" role="tab" aria-controls="seguimiento" aria-selected="false">Seguimiento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="atendido-tab" data-toggle="tab" href="#atendido" role="tab" aria-controls="atendido" aria-selected="false">Atendido</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="recepcion" role="tabpanel" aria-labelledby="recepcion-tab">
                                <div class="card-body card-block">
                                    <div><label for='text-input' class='form-control-label' > Todos los datos son requeridos.</label></div><br>
                                    <form action="insertCaptura" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" required> No. de Oficio Recepción</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" OnKeyUp="Upper(this);" name="no_oficio" class="form-control" value="<?php echo set_value('no_oficio'); ?>" ></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Día y Hora Recepción</label></div>
                                            <div class="col-12 col-md-9">
                                                <div class='input-group' >                                        
                                                    <input type='text-input' class="form-control" id="datepicker" name="fecha_r" value="<?php echo set_value('fecha_r'); ?>">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha y Hora Recepción</label></div>
                                            <div class="col-12 col-md-9">
                                                <div class="input-group">                                        
                                                    <input type="text-input" class="form-control" id="datepickerf" name="fecha_rec" value="<?php echo set_value('fecha_rec'); ?>">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha Real</label></div>
                                            <div class="col-12 col-md-9">
                                                <div class='input-group' >
                                                    <input type='text-input' class="form-control" id="date1" name="fecha_real" value="<?php echo set_value('fecha_real');?>"  >
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar" ></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class="form-control-label"> Firma Origen</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="text-input" OnKeyUp="Upper(this);" name="firma_r" class="form-control" value="<?php echo set_value('firma_r'); ?>"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class="form-control-label"> Cargo</label></div>
                                            <div class="col-12 col-md-9"><textarea name="cargo_r" id="textarea-input" OnKeyUp="Upper(this);" rows="1" class="form-control"><?php echo set_value('cargo_r'); ?></textarea></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class="form-control-label"> Peticion</label></div>
                                            <div class="col-12 col-md-9"><textarea name="peticion_r" id="textarea-input" OnKeyUp="Upper(this);" rows="5" class="form-control"><?php echo set_value('peticion_r'); ?></textarea></div>
                                        </div>
                                        <div><label for='text-input' class='form-control-label fa fa-exclamation' > Nombre de archivo sin ningun tipo de carácter (/,$,(),-,#)</label></div><br>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input" class="form-control-label"> Archivo Entrada</label></div>
                                            <div class="col-12 col-md-9"><input id="file-input" name="entrada" class="form-control-file" type="file" ></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"> Atención</label></div>
                                            <div class="col-12 col-md-9">
                                                <select name='atencion1' id='atencion1' class='form-control'>
                                                <?php
                                                //se toman los datos de todos los usuarios para la insesión
                                                    foreach ( $atencion as $us) {
                                                        echo "<option value='$us->id_usuario'".set_select('atencion1',$us->nombre.' '.$us->apellidop.' '.$us->apellidom).">".$us->nombre.' '.$us->apellidop.' '.$us->apellidom."</option>";
                                                    }
                                                ?>
                                                </select>
                                            </div>    
                                        </div><!--/form--> 
                                </div><!-- card-block -->  
                            </div>
                            <div class="tab-pane fade" id="seguimiento" role="tabpanel" aria-labelledby="seguimiento-tab">
                                <div class="card-body card-block">
                                    <div><label for='text-input' class='form-control-label' > Todos los datos son requeridos.</label></div><br>                                    
                                        <!--form action="insertaCaptura2" method="post" enctype="multipart/form-data" class="form-horizontal"-->
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class=' form-control-label'>No Oficio Seguimiento</label></div>
                                        <div class='col-12 col-md-9'><input type='text-input' id="text-input" name='nomenclatura' class='form-control' value="<?php echo set_value('nomenclatura');?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha De Atención</label></div>
                                            <div class="col-12 col-md-9">
                                                <div class='input-group' >
                                                    <input type='text-input' class="form-control" id="date2" name="fecha" value="<?php echo set_value('fecha');?>"  >
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar" ></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Asunto</label></div>
                                                <div class="col-12 col-md-9"><textarea name="asunto" id="textarea-input" OnKeyUp="Upper(this);" rows="5" class="form-control"><?php echo set_value('asunto');?></textarea></div>
                                            </div>
                                            <div class="row form-group">
                                                        <div class="col col-md-3"><label class=" form-control-label">Etiquetas de Asuntos</label></div>
                                                        <div class="col col-md-9">
                                                            <div class="form-check">
                                                                <div class="checkbox">
                                                                    <label for="checkbox1" class="form-check-label ">
                                                                        <input type="checkbox" id="checkbox1" name="colaboracion" value="1" <?php echo set_checkbox('colaboracion','1');?> class="form-check-input"> Colaboración
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox2" class="form-check-label ">
                                                                        <input type="checkbox" id="checkbox2" name="amparos" value="1" <?php echo set_checkbox('amparos','1');?> class="form-check-input"> Amparos
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox3" class="form-check-label ">
                                                                        <input type="checkbox" id="checkbox3" name="solicitudes" value="1" <?php echo set_checkbox('solicitudes','1');?> class="form-check-input"> Solicitudes
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox4" class="form-check-label ">
                                                                        <input type="checkbox" id="checkbox4" name="gestion" value="1" <?php echo set_checkbox('gestion','1');?> class="form-check-input"> Gestión
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox5" class="form-check-label ">
                                                                        <input type="checkbox" id="checkbox5" name="cursos" value="1" <?php echo set_checkbox('cursos','1');?> class="form-check-input"> Cursos y Capacitaciones
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox6" class="form-check-label ">
                                                                        <input type="checkbox" id="checkbox6" name="juzgados" value="1" <?php echo set_checkbox('juzgados','1');?> class="form-check-input"> Juzgados
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox7" class="form-check-label ">
                                                                        <input type="checkbox" id="checkbox7" name="rh" value="1" <?php echo set_checkbox('rh','1');?> class="form-check-input"> Recursos Humanos
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox8" class="form-check-label ">
                                                                        <input type="checkbox" id="checkbox8" name="telefonia" value="1" <?php echo set_checkbox('telefonia','1');?> class="form-check-input"> Telefonía
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox9" class="form-check-label ">
                                                                        <input type="checkbox" id="checkbox9" name="estadistica" value="1" <?php echo set_checkbox('estadistica','1');?> class="form-check-input"> Estadística
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox10" class="form-check-label">
                                                                        <input type="checkbox" id="checkbox10" name="ri" value="1" <?php echo set_checkbox('ri','1');?> class="form-check-input"> Relaciones Interinstitucionales
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox11" class="form-check-label">
                                                                        <input type="checkbox" id="checkbox11" name="boletas" value="1" <?php echo set_checkbox('boletas','1');?> class="form-check-input"> Boletas de Audiencia
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox12" class="form-check-label">
                                                                        <input type="checkbox" id="checkbox12" name="conocimiento" value="1" <?php echo set_checkbox('conocimiento','1');?>class="form-check-input"> Copias de Conocimiento
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label class=" form-control-label">Dirigido A:</label></div>
                                                        <div class="col col-md-9">
                                                            <div class="form-check">
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox1" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox1" name="conase" value="1" <?php echo set_checkbox('conase','1');?> class="form-check-input"> CONASE
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox2" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox2" name="toluca" value="1" <?php echo set_checkbox('toluca','1');?> class="form-check-input"> Valle de Toluca
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox3" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox3" name="mexico" value="1" <?php echo set_checkbox('mexico','1');?> class="form-check-input"> Valle de México
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox4" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox4" name="zoriente" value="1" <?php echo set_checkbox('zoriente','1');?> class="form-check-input"> Secuestros de Zona Oriente
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox5" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox5" name="fgeneral" value="1" <?php echo set_checkbox('fgeneral','1');?> class="form-check-input"> Fiscal General
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox6" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox6" name="vicefiscalia" value="1" <?php echo set_checkbox('vicefiscalia','1');?> class="form-check-input"> Vicefiscalia
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox7" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox7" name="oficialia" value="1" <?php echo set_checkbox('oficialia','1');?> class="form-check-input"> Oficialía Mayor
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox8" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox8" name="informacion" value="1" <?php echo set_checkbox('informacion','1');?> class="form-check-input"> Departamento de Información y Estadistica
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox9" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox9" name="central" value="1" <?php echo set_checkbox('central','1');?> class="form-check-input"> Central Jurídico
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="inline-checkbox10" class="form-check-label ">
                                                                        <input type="checkbox" id="inline-checkbox10" name="servicio" value="1" <?php echo set_checkbox('servicio','1');?> class="form-check-input"> Servicio Carrera
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Otra:</label></div>
                                                                    <div class="col-12 col-md-9"><textarea name="otrad" id="textarea-input" OnKeyUp="Upper(this);" rows="5" class="form-control"><?php echo set_value('otrad');?></textarea></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                            <div class="col col-md-3"><label class=" form-control-label">Acciones</label></div>
                                                            <div class="col col-md-9">
                                                                <div class="form-check">
                                                                    <div class="checkbox">
                                                                        <label for="checkbox13" class="form-check-label ">
                                                                            <input type="checkbox" id="checkbox13" name="diligencias" value="1" <?php echo set_checkbox('diligencias','1');?> class="form-check-input"> Realizar Diligencias en Vía de Colaboración
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <label for="checkbox14" class="form-check-label ">
                                                                            <input type="checkbox" id="checkbox14" name="personalmente" value="1" <?php echo set_checkbox('personalmente','1');?> class="form-check-input"> Recibir Personalmente en Audiencia e Informar
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <label for="checkbox15" class="form-check-label ">
                                                                            <input type="checkbox" id="checkbox15" name="gestionar" value="1" <?php echo set_checkbox('gestionar','1');?> class="form-check-input"> Gestionar Petición y Permitir Constancias que Acrediten la Atención Brindada
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <label for="checkbox16" class="form-check-label ">
                                                                            <input type="checkbox" id="checkbox16" name="archivo" value="1" <?php echo set_checkbox('archivo','1');?> class="form-check-input"> Archivo
                                                                        </label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Otra:</label></div>
                                                                        <div class="col-12 col-md-9"><textarea name="otrar" id="textarea-input" OnKeyUp="Upper(this);" rows="5" class="form-control"><?php echo set_value('otrar');?></textarea></div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form form-group">
                                                        <div class="col col-md-3"><label class="form-control-label">Informar A:</label></div>
                                                        <div class="col col-md-9">
                                                            <div class="form-check">
                                                                <div class="checkbox">
                                                                    <label for="checkbox17" class="form-check-label">
                                                                        <input type="checkbox" id="checkbox17" name="oficina" value="1" <?php echo set_checkbox('oficina','1');?> class="form-check-input"> Esta Oficina
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbox18" class="form-check-label">
                                                                        <input type="checkbox" id="checkbox18" name="peticionario" value="1" <?php echo set_checkbox('peticionario','1');?> class="form-check-input"> Peticionario
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox">
                                                                    <label for="checkbo19" class="form-check-label">
                                                                        <input type="checkbox" id="checkbox19" name="requiriente" value="1" <?php echo set_checkbox('requiriente','1');?> class="form-check-input"> Institución Requiriente
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="select" class=" form-control-label"> Término en horas</label></div>
                                                            <div class='col-12 col-md-9'>
                                                            <div class='input-group' >
                                                                <input type='text-input' class="form-control" id="datepickert" name="termino" value="<?php echo set_value('termino');?>"  >
                                                                <span class="input-group-addon">
                                                                    <span class="fa fa-calendar" ></span>
                                                                </span>
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-sm-3"><label for="textarea-input" class=" form-control-label">Observaciones</label></div>
                                                        <div class="col col-md-9"><textarea name="observaciones" id="textarea-input" OnKeyUp="Upper(this);" rows="9" class="form-control"><?php echo set_value('observaciones');?></textarea></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="select" class=" form-control-label"> Atención Seguimiento</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name='atencion2' id='atencion2' class='form-control'>
                                                                <?php
                                                                //se toman los datos de todos los usuarios para la insesión
                                                                foreach ( $atencion as $us) {
                                                                    echo "<option value='$us->id_usuario'".set_select('atencion2',$us->nombre.' '.$us->apellidop.' '.$us->apellidom).">".$us->nombre.' '.$us->apellidop.' '.$us->apellidom."</option>";
                                                                }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>   
                                        <!--/form>< form-->
                                </div> <!-- card-body-->
                            </div>        
                                <div class="tab-pane fade" id="atendido" role="tabpanel" aria-labelledby="atendido-tab">
                                    <div class="card-body card-block">
                                        <div><label for='text-input' class='form-control-label' > Todos los datos son requeridos.</label></div><br>
                                        <!--form action="insertCaptura" method="post" enctype="multipart/form-data" class="form-horizontal"-->
                                            <?php
                                                //echo date('l jS \of F Y h:i:s A');
                                                //oficio entrada e id                                       
                                            ?>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha Atendido</label></div>
                                                <div class="col-12 col-md-9">
                                                    <div class='input-group' >                                        
                                                        <input type='text-input' class="form-control" id="date3" name="fecha_at" value="<?php echo set_value('fecha_at'); ?>">
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Nombre</label></div>
                                                <div class="col-12 col-md-9"><input type="text" id="text-input" OnKeyUp="Upper(this);" name="nombre_at" class="form-control" value="<?php echo set_value('nombre_at'); ?>"></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input" class="form-control-label"> Cargo</label></div>
                                                <div class="col-12 col-md-9"><textarea name="cargo_at" id="textarea-input" OnKeyUp="Upper(this);" rows="1" class="form-control"><?php echo set_value('cargo_at'); ?></textarea></div>
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
                                                <div class="col col-md-3"><label for="select" class=" form-control-label"> Atención</label></div>
                                                <div class="col-12 col-md-9">
                                                    <select name='atencion' id='atencion' class='form-control'>
                                                        <?php
                                                        //se toman los datos de todos los usuarios para la insesión
                                                        foreach ( $atencion as $us) {
                                                            echo "<option value='$us->id_usuario'".set_select('atencion',$us->nombre.' '.$us->apellidop.' '.$us->apellidom).">".$us->nombre.' '.$us->apellidop.' '.$us->apellidom."</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>                                          
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o">Guardar</i>  
                                                </button>
                                            </div>    
                                    </div>           
                                        <!--/form><--/form-->
                                </div>                                    
                                <?php
                                    echo validation_errors();
                                ?>  
                        </div> <!-- tab-content -->
                    </div>     <!-- card-body -->
                </div> <!-- card -->
            </div>  <!-- col-lg-9 -->
        </div>  <!-- row -->
    </div> <!-- animated fadeIn-->
</div> <!-- content mt-3 -->