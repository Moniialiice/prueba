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
                <h1>Consulta Oficio Seguimiento</h1>
            </div>
        </div>
    </div>
<?php
    foreach ($datos as $dato) 
    {
        $ido = $dato->id_oficioseg;
        $io = base64_encode($ido);
        //cambia formato de fecha  
        $date = $dato->fecha;
        //corta los datos de d,m,a
        $ext = explode("-",$date);
        echo"    
        <div class='col-sm-8'>
            <div class='page-header float-right'>
                <div class='page-title'>
                    <ol class='breadcrumb text-right'>
                        <li><a href='imprimirOficio/".$io."' target='_blank'><img src='assets/img/pdf.png' width='30' height='30'></a></li>
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
                        <strong>Consulta Oficio Seguimiento</strong>
                    </div>
                    <div class='card-body card-block'>";
                    //Mensajes
                    if($this->session->flashdata('Modificado')){
                        echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Datos modificados correctamente.</label></div>";
                    }else{if($this->session->flashdata('No')){
                        echo "<div><label for='text-input' class='form-control-label fa fa-exclamation' > Datos no modificados.</label></div>";
                    }
                    }if($this->session->flashdata('Error')){
                        echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Consultar administrador.</label></div>";
                    }
            echo"<br>    <form action='#' method='' enctype='multipart/form-data' class='form-horizontal'>";
                                echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class=' form-control-label'>Nomenclatura</label></div>
                                        <div class='col-12 col-md-9'>
                                            <input type='text' id='disabled-input' name='nomenclatura' class='form-control' value='".$dato->nomenclatura."' disabled></div>
                                       </div> ";
                                echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class='form-control-label'>Asunto</label></div>
                                         <div class='col-12 col-md-9'>
                                            <textarea name='asunto' id='textarea-input' rows='3' class='form-control' disabled>".$dato->asunto."</textarea></div>
                                    </div>";
                                echo "<div class='row form-group'>
                                            <div class='col col-md-3'><label for='fecha' class=' form-control-label'>Fecha</label></div>
                                            <div class='col-12 col-md-9' ><input type='text' id='disable-input' name='fecha' class='form-control' value='".$ext[2]."/".$ext[1]."/".$ext[0]."' disabled></div>
                                        </div> ";
                                echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class=' form-control-label'>Plazo Finalizado</label></div>";
                                        $datet = $dato->termino;
                                        $espaciot = explode(" ", $datet);
                                        $fect = explode("-", $espaciot[0]);
                                        $fechat = $fect[2]."/".$fect[1]."/".$fect[0]." ".$espaciot[1];
                                        echo "<div class='col-12 col-md-9'><input type='text' id='text-input' name='plazo' class='form-control' value='".$fechat."' disabled></div>
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
                                        <div class='col col-md-3'><label class=' form-control-label'>Dirigido a:</label></div>
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
                                        if($dato->fiscal_general == 1){
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
                                        if($dato->servicio_carrera== 1){
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
                                                        <div class='col-12 col-md-9'><textarea name='otrad' id='textarea-input' rows='5' placeholder='' class='form-control' disabled>".$dato->otra."</textarea></div>
                                                   </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                        <div class='col col-md-3'><label for='text-input' class='form-control-label'>Otra:</label></div>
                                                        <div class='col-12 col-md-9'><textarea name='otrad' id='textarea-input' rows='5' placeholder='' class='form-control disabled'></textarea></div>
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
                                         if($dato->gestionar_peticion == 1){
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
                                echo "<div class='row form-group'>
                                        <div class='col col-md-3'><label class='form-control-label'>Informar a:</label></div>
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
                                                        <input type='checkbox' id='checkbox2' name='peticionario' value='1' class='form-check-input' checked disabled> Peticionario
                                                    </label>
                                                </div>";
                                        }else{
                                            echo "<div class='checkbox'>
                                                    <label for='checkbox3' class='form-check-label'>
                                                        <input type='checkbox' id='checkbox2' name='peticionario' value='1' class='form-check-input' disabled> Peticionario
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
                                    </div>";    
                                echo "</div>
                                    <div class='row form-group'>
                                        <div class='col col-sm-3'><label for='textarea-input' class=' form-control-label'>Observaciones</label></div>
                                        <div class='col-12 col-md-9'><textarea name='observaciones' id='textarea-input' rows='9' class='form-control' disabled>".$dato->observaciones."</textarea></div>
                                    </div>
                                    <div class='row form-group'>
                                        <div class='col col-sm-3'><label for='text-input' class=' form-control-label'>Oficio Recepción</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' value='".$dato->no_oficioEntrada."' class='form-control' disabled></div>
                                        <input type='text' id='text-input' name='entrada' value='".$dato->id_oficioEntrada."' hidden>
                                    </div>";
                                    echo "
                                    <div class='row form-group'>
                                        <div class='col col-md-3'><label for='text-input' class=' form-control-label'>Atención</label></div>
                                        <div class='col-12 col-md-9'><input type='text' id='text-input' class='form-control' value='".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."' disabled></div>
                                    </div>";                     
                                }
                            
        echo"       </div> <!-- card-body-->
                </div>
            </div>
        </div>";        
?>