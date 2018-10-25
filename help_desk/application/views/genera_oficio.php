<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 21/08/2018
 * Time: 01:04 PM
 */

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Generar Oficio Seguimiento</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="consultaEntrada">Consultar Oficio Recepción</a></li>
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
                        <strong>Datos Oficio Seguimiento</strong>
                    </div>
                    <div class="card-body card-block">
                    <div class="error"></div>
                        <?php
                            if($this->session->flashdata('Creado')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Datos ingredos correctamente.</label></div>";
                            }
                            if($this->session->flashdata('No')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Datos no ingresados.</label></div>";    
                            }
                            if($this->session->flashdata('Error')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Datos no recibidos, consultar administrador.</label></div>";
                            }
                            echo validation_errors();
                        ?>
                        
                        <form action="insertaOficio" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Oficio Recepción</label></div>
                                    <?php
                                        //echo date('l jS \of F Y h:i:s A');
                                    //oficio entrada e id
                                        foreach ($datos as $dato)
                                        {
                                            echo "<div class='col-12 col-md-9'>
                                            <input type='text' id='text-input' value='".$dato->no_oficioEntrada."' class='form-control' disabled>
                                            <input type='text' id='text-input' name='entrada' value='".$dato->id_oficioEntrada."' hidden>
                                            </div>";
                                        }
                                        
                                    ?>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Selecciona Oficio</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="tipoOficio" id="tipoOficio" class="form-control" >
                                        <option  value="400LIA000" <?php echo set_select('tipoOficio','400LIA000');?>>Cordinador General</option>
                                        <option  value="400LI0010" <?php echo set_select('tipoOficio','400LI0010');?>>Secretario Particular</option>
                                    </select>
                                </div>
                            </div>  
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha Recepción</label></div>
                                <div class="col-12 col-md-9">
                                    <div class='input-group' >
                                        <input type='text-input' class="form-control" id="datepicker" name="fecha" value="<?php echo set_value('fecha');?>"  >
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar" ></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Asunto</label></div>
                                <div class="col-12 col-md-9"><textarea name="asunto" id="textarea-input" rows="5" class="form-control"><?php echo set_value('asunto');?></textarea></div>
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
                                            <div class="col-12 col-md-9"><textarea name="otrad" id="textarea-input" rows="5" class="form-control"><?php echo set_value('otrad');?></textarea></div>
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
                                                <div class="col-12 col-md-9"><textarea name="otrar" id="textarea-input" rows="5" class="form-control"><?php echo set_value('otrar');?></textarea></div>
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
                                <div class="col col-md-3"><label for="select" class=" form-control-label"> Término:</label></div>
                                    <div class="col col-md-9">
                                        <select name="termino" id="termino" class=" form-control">
                                            <option value="2" <?php echo set_select('termino','2');?>>48:00 hrs</option>
                                            <option value="1" <?php echo set_select('termino','1');?>>24:00 hrs</option>
                                            <option value="0" <?php echo set_select('termino','0');?>>00:00 hrs</option>
                                        </select>    
                                    </div>    
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-3"><label for="textarea-input" class=" form-control-label">Observaciones</label></div>
                                <div class="col col-md-9"><textarea name="observaciones" id="textarea-input" rows="9" class="form-control"><?php echo set_value('observaciones');?></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class= "col col-md3"><label for="text-input" class="form-control-label">Atención</label></div>
                                <?php
                                //se toman los datos del usuario de las sesiones
                                    $id = $this->session->userdata('id_usuario');
                                    $nom = $this->session->userdata('name');
                                    echo "<div class='col-12 col-md-9'><input type='text' id='text-input' class='form-control' value='".$nom."' disabled>
                                          <input type='text' id='text-input' name='atencion' value='".$id."' hidden>
                                          </div>";?>    
                            </div>
                        <!-- form-->
                    </div> <!-- card-body-->

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
