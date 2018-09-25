<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 21/08/2018
 * Time: 01:04 PM
 */

?>

<div class='breadcrumbs'>
    <div class='col-sm-4'>
        <div class='page-header float-left'>
            <div class='page-title'>
                <h1>Actualiza Oficio</h1>
            </div>
        </div>
    </div>
    <div class='col-sm-8'>
        <div class='page-header float-right'>
            <div class='page-title'>
                <ol class='breadcrumb text-right'>
                    <!--li><a href='list'>Consultar</a></li-->
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
                        <strong>Actualiza Oficio Seguimiento</strong>
                    </div>
                    <div class='card-body card-block'>
                        <form action='actualizaOficio' method='post' enctype='multipart/form-data' class='form-horizontal'>
                            <?php
                                foreach ($datos as $dato) {

                                echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label for='nomenclatura' class=' form-control-label'>Nomenclatura</label></div>
                                        <div class='col-12 col-md-9'>
                                            <input type='text' id='disable-input' name='nomenclatura' class='form-control' disabled>".$dato->nomenclatura."</div>
                                       </div> ";
                                echo "       <div class='row form-group'>
                                        <div class='col col-md-3'><label for='asunto' class=' form-control-label'>Asunto</label></div>
                                        <div class='col-12 col-md-9'>
                                            <input type='text' id='disable-input' name='asunto' class='form-control' disabled>".$dato->asunto."</div>
                                       </div>";
                                echo "<div class='row form-group'>
                                            <div class='col col-md-3'><label for='fecha' class=' form-control-label'>Fecha</label></div>
                                            <div class='col-12 col-md-9'><input type='text' id='disable-input' name='fecha' class='form-control' disabled>".$dato->fecha."</div>
                                        </div> ";
                                echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label for='hora' class=' form-control-label'>Hora</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='disable-input' name='correo' class='form-control' disabled>".$dato->hora."</div>
                                    </div>";
                                echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label class=' form-control-label'>Etiquetas de Asuntos</label></div>
                                        <div class='col col-md-9'>
                                            <div class='form-check'>";
                                        if($dato->colaboracion == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox1' name='colaboracion' value='1' class='form-check-input' checked disabled> Colaboración
                                                    </label>
                                                  </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox1' name='colaboracion' value='1' class='form-check-input' disabled> Colaboración
                                                    </label>
                                                  </div>";
                                        }
                                        if($dato->amparos == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox1' name='amparos' value='1' class='form-check-input' checked disabled> Amparos
                                                    </label>
                                                  </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox1' name='amparos' value='1' class='form-check-input' disabled> Amparos
                                                    </label>
                                                  </div>";
                                        }
                                        if($dato->solicitudes == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox2' name='solicitudes' value='1' class='form-check-input' checked disabled > Solicitudes
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox2' name='solicitudes' value='1' class='form-check-input' disabled> Solicitudes
                                                    </label>
                                                </div>";
                                        }
                                        if ($dato->gestion == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox3' name='gestion' value='1' class='form-check-input' checked disabled> Gestión
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox3' name='gestion' value='1' class='form-check-input' disabled> Gestión
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->cursos_capacitaciones == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox4' name='cursos' value='1' class='form-check-input' checked disabled> Cursos y Capacitaciones
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox4' name='cursos' value='1' class='form-check-input' disabled> Cursos y Capacitaciones
                                                    </label>
                                                </div>";
                                        }
                                        if ($dato->juzgados == 1){
                                             echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox5' name='juzgados' value='1' class='form-check-input' checked disabled> Juzgados
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox5' name='juzgados' value='1' class='form-check-input' disabled> Juzgados
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->recursos_humanos == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox6' name='rh' value='1' class='form-check-input' checked disabled> Recursos Humanos
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox6' name='rh' value='1' class='form-check-input' disabled> Recursos Humanos
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->telefonia == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox7' name='telefonia' value='1' class='form-check-input' checked disabled> Telefonía
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox7' name='telefonia' value='1' class='form-check-input' disabled> Telefonía
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->estadistica == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox8' name='estadistica' value='1' class='form-check-input' checked disabled> Estadística
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox8' name='estadistica' value='1' class='form-check-input' disabled> Estadística
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->relaciones_interis == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox9' name='ri' value='1' class='form-check-input' checked disabled> Relaciones Interinstitucionales
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox9' name='ri' value='1' class='form-check-input' disabled> Relaciones Interinstitucionales
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->boletas_audiencia == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox10' name='boletas' value='1' class='form-check-input' checked disabled> Boletas de Audiencia
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox10' name='boletas' value='1' class='form-check-input' disabled> Boletas de Audiencia
                                                    </label>
                                                </div>";
                                        }
                                        if ($dato->copias_conocimiento == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox11' name='conocimiento' value='1' class='form-check-input' checked disabled> Copias de Conocimiento
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox11' name='conocimiento' value='1' class='form-check-input' disabled> Copias de Conocimiento
                                                    </label>
                                                </div>";
                                        }

                                          echo "                                         
                                            </div>
                                        </div>     
                                      </div>";
                                        echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label class=' form-control-label'>Dirigido A:</label></div>
                                        <div class='col col-md-9'>
                                            <div class='form-check'>";
                                        if($dato->conase == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox1' name='conase' value='1' class='form-check-input' checked disabled> CONASE
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox1' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox1' name='conase' value='1' class='form-check-input' disabled> CONASE
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->valle_toluca == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox2' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox2' name='toluca' value='1' class='form-check-input' checked disabled> Valle de Toluca
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox2' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox2' name='toluca' value='1' class='form-check-input' disabled> Valle de Toluca
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->valle_mexico == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox3' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox3' name='mexico' value='1' class='form-check-input' checked disabled> Valle de México
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox3' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox3' name='mexico' value='1' class='form-check-input' disabled> Valle de México
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->zona_oriente == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox4' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox4' name='zoriente' value='1' class='form-check-input' checked disabled> Secuestros Zona Oriente
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox4' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox4' name='zoriente' value='1' class='form-check-input' disabled> Secuestros Zona Oriente
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->fiscal_genral == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox5' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox5' name='fgeneral' value='1' class='form-check-input' checked disabled> Fiscal General
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox5' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox5' name='fgeneral' value='1' class='form-check-input' disabled> Fiscal General
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->vicefiscalia == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox6' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox6' name='vicefiscalia' value='1' class='form-check-input' checked disabled> Vicefiscalia
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox6' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox6' name='vicefiscalia' value='1' class='form-check-input' disabled> Vicefiscalia
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->oficialia_mayor == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox7' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox7' name='oficialia' value='1' class='form-check-input' checked disabled> Oficialia Mayor
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox7' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox7' name='oficialia' value='1' class='form-check-input' disabled> Oficialia Mayor
                                                    </label>
                                                </div>";
                                        }
                                        if ($dato->informacion_estadistica == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox8' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox8' name='informacion' value='1' class='form-check-input' checked disabled> Departamento de Información y Estadistica
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox8' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox8' name='informacion' value='1' class='form-check-input' disabled> Departamento de Información y Estadistica
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->central_juridico == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox9' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox9' name='central' value='1' class='form-check-input' checked disabled> Central Juridico
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox9' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox9' name='central' value='1' class='form-check-input' disabled> Central Juridico
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->servicio_carrera1== 1){
                                            echo"<div class='checkbox'>
                                                    <label for='checkbox10' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox10' name='servicio' value='1' class='form-check-input' disabled checked> Servicio Carrera
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox10' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox10' name='servicio' value='1' class='form-check-input' disabled> Servicio Carrera
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->otra != " "){
                                            echo "<div class='checkbox'>
                                                        <div class='col col-md-3'><label for='text-input' class='form-control-label'>Otra:</label></div>
                                                        <div class='col-12 col-md-9'><textarea name='otra' id='textarea-input' rows='5' placeholder='' class='form-control' disabled>".$dato->otra."</textarea></div>
                                                   </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                        <div class='col col-md-3'><label for='text-input' class='form-control-label'>Otra:</label></div>
                                                        <div class='col-12 col-md-9'><textarea name='otra' id='textarea-input' rows='5' placeholder='' class='form-control disabled'></textarea></div>
                                                    </div>";
                                        }
                                        echo "
                                            </div> 
                                        </div>       
                                      </div>";
                                echo "<div class='row form-group'>
                                         <div class='col col-md-3'><label class=' form-control-label'>Acciones</label></div>
                                            <div class='col col-md-9'>
                                                <div class='form-check'>";
                                         if($dato->realiza_diligencias == 1){
                                             echo "<div class='checkbox'>
                                                        <label for='checkbox1' class='form-check-label'>
                                                            <input type='checkbox' id='checkbox1' name='diligencias' value='1' class='form-check-input' disabled checked> Realizar Diligencias en vía de Colaboración
                                                        </label>
                                                    </div>";
                                         }else{
                                             echo"<div class='checkbox'>
                                                        <label for='checkbox1' class='form-check-label'>
                                                            <input type='checkbox' id='checkbox1' name='diligencias' value='1' class='form-check-input' disabled> Realizar Diligencias en vía de Colaboración
                                                        </label>
                                                   </div>";
                                         }
                                         if($dato->recibir_personalmente == 1){
                                             echo "<div class='checkbox'>
                                                        <label for='checkbox2' class='form-check-label'>
                                                            <input type='checkbox' id='checkbox2' name='personalmente' value='1' class='form-check-input' checked disabled> Recibir Personalmente en Audiencia e Informar
                                                        </label>
                                                    </div>";
                                         }else{
                                             echo "<div class='checkbox'>
                                                        <label for='checkbox2' class='form-check-label'>
                                                            <input type='checkbox' id='checkbox2' name='personalmente' value='1' class='form-check-input' disabled> Recibir Personalmente en Audiencia e Informar
                                                        </label>
                                                   </div>";
                                         }
                                         if($dato->gestionar_perticion == 1){
                                             echo "<div class='checkbox'>
                                                        <label for='checkbox3' class='form-check-label'>
                                                            <input type='checkbox' id='checkbox3' name='gestionar' value='1' class='form-check-input' checked disabled> Gestionar Petición y Permitir Constancias que Acrediten la Atención Brindada
                                                        </label>
                                                    </div>";
                                         }else{
                                             echo "<div class='checkbox'>
                                                        <label for='checkbox3' class='form-check-label'>
                                                            <input type='checkbox' id='checkbox3' name='gestionar' value='1' class='form-check-input' disabled> Gestionar Petición y Permitir Constancias que Acrediten la Atención Brindada
                                                        </label>
                                                    </div>";
                                         }
                                         if ($dato->archivo == 1){
                                             echo "<div class='checkbox'>
                                                        <label for='checkbox4' class='form-check-label'>
                                                            <input type='checkbox' id='checkbox4' name='archivo' value='1' class='form-check-input' checked disabled> Archivo
                                                        </label>
                                                    </div>";
                                         }else{
                                             echo "<div class='checkbox'>
                                                        <label for='checkbox4' class='form-check-label'>
                                                            <input type='checkbox' id='checkbox4' name='archivo' value='1' class='form-check-input' disabled> Archivo
                                                        </label>
                                                    </div>";
                                         }
                                         if($dato->otras != " "){
                                             echo "<div class='checkbox'>
                                                        <div class='col col-md-3'><label for='text-input' class='form-control-label'>Otra:</label></div>
                                                        <div class='col-12 col-md-9'><textarea name='otra' id='textarea-input' rows='5' placeholder='' class='form-control' disabled >".$dato->otras."</textarea></div>
                                                    </div>";
                                         }else{
                                             echo "<div class='checkbox'>
                                                        <div class='col col-md-3'><label for='text-input' class='form-control-label'>Otra:</label></div>
                                                        <div class='col-12 col-md-9'><textarea name='otra' id='textarea-input' rows='5' placeholder='' class='form-control' disabled ></textarea></div>
                                                    </div>";
                                         }

                                    echo"     
                                                </div>
                                            </div>        
                                       </div>";
                                echo "<div class='row form form-group'>
                                        <div class='col col-md-3'><label class='form-control-label'>Informar A:</label></div>
                                        <div class='col col-md-9'>
                                            <div class='form-check'>";
                                        if($dato->esta_oficina == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox3' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox1' name='oficina' value='1' class='form-check-input' checked disabled> Esta Oficina
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox3' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox1' name='oficina' value='1' class='form-check-input' disabled> Esta Oficina
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->peticionario == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox3' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox2' name='peticionario' value='1' class='orm-check-input' checked disabled> Peticionario
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox3' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox2' name='peticionario' value='1' class='orm-check-input' disabled> Peticionario
                                                    </label>
                                                </div>";
                                        }
                                        if($dato->institucion_requiriente == 1){
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox3' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox3' name='requiere' value='1' class='form-check-input' checked disabled> Institución Requiriente
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbo3' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox3' name='requiere' value='1' class='form-check-input' disabled> Institución Requiriente
                                                    </label>
                                                </div>";
                                        }

                                 echo"    
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class=' form-control-label'>Termino:</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' name='termino' class='form-control'>".$dato->termino."</div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-sm-3'><label for='textarea-input' class=' form-control-label'>Observaciones</label></div>
                                        <div class='col-12 col-md-9'><textarea name='observaciones' id='textarea-input' rows='9' placeholder='' class='form-control'>".$dato->observaciones."</textarea></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='arc_entrada' class=' form-control-label'>Archivo Seguimiento (Opcional)</label></div>
                                        <div class='col-12 col-md-9'><input id='arc_opcional' name='opcional' class='form-control-file' type='file'></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='arc_entrada' class=' form-control-label' >Archivo final</label></div>
                                        <div class='col-12 col-md-9'><input id='arc_final' name='final' class='form-control-file' type='file'></div>
                                    </div>
                                    ";
                                }
                            ?>                            
                    </div> <!-- card-body-->

                    <div class='card-footer'>
                        <button type='submit' class='btn btn-primary btn-sm'>
                            <i class='fa fa-dot-circle-o'></i> Submit
                        </button>
                        <button type='reset' class='btn btn-danger btn-sm'>
                            <i class='fa fa-ban'></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
