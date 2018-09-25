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
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-header">
                        <strong>Datos Oficio Seguimiento</strong>
                    </div>
                    <div class="card-body card-block">
                        <?php
                            if($this->session->flashdata('Creado')){
                            echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Datos ingredos correctamente.</label></div>";
                            }else{if($this->session->flashdata('No')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Datos no ingresados.</label></div>";
                                }
                            }if($this->session->flashdata('Error')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Datos no recibidos.</label></div>";
                            }
                        ?>
                        <form action="insertaOficio" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Oficio Recepción</label></div>
                                    <?php
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
                                    <select name="tipo_oficio" id="select" class="form-control">
                                        <option name="nomenclatura" value="0">Cordinador Genaral</option>
                                        <option name="nomenclatura" value="1">Secretario Particular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Fecha Recepción</label></div>
                                <div class="col-12 col-md-9">
                                    <div class='input-group' >
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar" ></span>
                                        </span>
                                        <input type='text-input' class="form-control" id="datepicker" name="fecha">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Asunto</label></div>
                                <div class="col-12 col-md-9"><textarea name="asunto" id="textarea-input" rows="5" placeholder="" class="form-control"></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Etiquetas de Asuntos</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="checkbox1" name="colaboracion" value="1" class="form-check-input"> Colaboración
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="checkbox1" name="amparos" value="1" class="form-check-input"> Amparos
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox2" class="form-check-label ">
                                                <input type="checkbox" id="checkbox2" name="solicitudes" value="1" class="form-check-input"> Solicitudes
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="checkbox3" name="gestion" value="1" class="form-check-input"> Gestión
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="checkbox3" name="cursos" value="1" class="form-check-input"> Cursos y Capacitaciones
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="checkbox4" name="juzgados" value="1" class="form-check-input"> Juzgados
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="checkbox5" name="rh" value="1" class="form-check-input"> Recursos Humanos
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="checkbox6" name="telefonia" value="1" class="form-check-input"> Telefonía
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="checkbox7" name="estadistica" value="1" class="form-check-input"> Estadística
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label">
                                                <input type="checkbox" id="checkbox8" name="ri" value="1" class="form-check-input"> Relaciones Interinstitucionales
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label">
                                                <input type="checkbox" id="checkbox9" name="boletas" value="1" class="form-check-input"> Boletas de Audiencia
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label">
                                                <input type="checkbox" id="checkbox10" name="conocimiento" value="1" class="form-check-input"> Copias de Conocimiento
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
                                                <input type="checkbox" id="inline-checkbox1" name="conase" value="1" class="form-check-input"> CONASE
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="inline-checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="inline-checkbox2" name="toluca" value="1" class="form-check-input"> Valle de Toluca
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="inline-checkbox2" class="form-check-label ">
                                                <input type="checkbox" id="inline-checkbox3" name="mexico" value="1" class="form-check-input"> Valle de México
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="inline-checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="inline-checkbox4" name="zoriente" value="1" class="form-check-input"> Secuestros de Zona Oriente
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="inline-checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="inline-checkbox5" name="fgeneral" value="1" class="form-check-input"> Fiscal General
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="inline-checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="inline-checkbox6" name="vicefiscalia" value="1" class="form-check-input"> Vicefiscalia
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="inline-checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="inline-checkbox6" name="oficialia" value="1" class="form-check-input"> Oficialía Mayor
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="inline-checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="inline-checkbox7" name="informacion" value="1" class="form-check-input"> Departamento de Información y Estadistica
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="inline-checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="inline-checkbox8" name="central" value="1" class="form-check-input"> Central Jurídico
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="inline-checkbox3" class="form-check-label ">
                                                <input type="checkbox" id="inline-checkbox9" name="servicio" value="1" class="form-check-input"> Servicio Carrera
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Otra:</label></div>
                                            <div class="col-12 col-md-9"><textarea name="otrad" id="textarea-input" rows="5" placeholder="" class="form-control"></textarea></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Acciones</label></div>
                                    <div class="col col-md-9">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <label for="checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="checkbox1" name="diligencias" value="1" class="form-check-input"> Realizar Diligencias en Vía de Colaboración
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="checkbox2" class="form-check-label ">
                                                    <input type="checkbox" id="checkbox2" name="personalmente" value="1" class="form-check-input"> Recibir Personalmente en Audiencia e Informar
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="checkbox3" class="form-check-label ">
                                                    <input type="checkbox" id="checkbox3" name="gestionar" value="1" class="form-check-input"> Gestionar Petición y Permitir Constancias que Acrediten la Atención Brindada
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label for="checkbox3" class="form-check-label ">
                                                    <input type="checkbox" id="checkbox4" name="archivo" value="1" class="form-check-input"> Archivo
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Otra:</label></div>
                                                <div class="col-12 col-md-9"><textarea name="otrar" id="textarea-input" rows="5" placeholder="" class="form-control"></textarea></div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form form-group">
                                <div class="col col-md-3"><label class="form-control-label">Informar A:</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label">
                                                <input type="checkbox" id="checkbox1" name="oficina" value="1" class="form-check-input"> Esta Oficina
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbox3" class="form-check-label">
                                                <input type="checkbox" id="checkbox2" name="peticionario" value="1" class="form-check-input"> Peticionario
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkbo3" class="form-check-label">
                                                <input type="checkbox" id="checkbox3" name="requiriente" value="1" class="form-check-input"> Institución Requiriente
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Termino:</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="termino" placeholder="" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-3"><label for="textarea-input" class=" form-control-label">Observaciones</label></div>
                                <div class="col-12 col-md-9"><textarea name="observaciones" id="textarea-input" rows="9" placeholder="" class="form-control"></textarea></div>
                            </div>
                            <div class="row form-group">
                                <div class= "col col-md3"><label for="text-input" class="form-control-label">Atención</label></div>
                                <?php
                                //se toman los datos del usuario de las sesiones
                                    $id = $this->session->userdata('id_usuario');
                                    $nom = $this->session->userdata('usuario');
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
