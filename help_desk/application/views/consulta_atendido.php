<div class='breadcrumbs'>
    <div class='col-sm-4'>
        <div class='page-header float-left'>
            <div class='page-title'>
                <h1>Oficio Seguimiento Atendido</h1>
            </div>
        </div>
    </div>
    <div class='col-sm-8'>
        <div class='page-header float-right'>
            <div class='page-title'>
                <ol class='breadcrumb text-right'>
                    <li><a href=''></a></li>
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
                        <strong>Datos Oficio Seguimiento Atendido</strong>
                    </div>
                    <div class='card-body card-block'>
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
                        
                        //echo date('l jS \of F Y h:i:s A');
                        foreach ($datos as $dato)
                        {
                            //cambia formato de fecha  
                            $date = $dato->fecha_atendido;
                            //corta los datos de d,m,a
                            $ext = explode("-",$date);
                echo   "<form action='#' method='' enctype='multipart/form-data' class='form-horizontal'>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class=' form-control-label'>Oficio Seguimiento</label></div>";
                                echo "<div class='col-12 col-md-9'>
                                        <input type='text' id='text-input' value='".$dato->nomenclatura."' class='form-control' disabled>
                                        <input type='text' id='text-input' name='segui' value='".$dato->id_oficioseg."' hidden>
                                      </div>
                            </div>";              
                echo        "<div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class=' form-control-label'> Fecha Atendido</label></div>
                                <div class='col-12 col-md-9'>
                                    <div class='input-group' >                                        
                                        <input type='text-input' class='form-control' id='datepicker' name='fecha' value='".$ext[2]."/".$ext[1]."/".$ext[0]."' disabled>
                                        <span class='input-group-addon'>
                                            <span class='fa fa-calendar'></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'>  Asunto</label></div>
                                <div class='col-12 col-md-9'><textarea name='asunto' id='textarea-input' rows='5' class='form-control' disabled>".$dato->asunto."</textarea></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Nombre</label></div>
                                <div class='col-12 col-md-9'><input type='text' id='text-input' name='nombre' class='form-control' value='".$dato->nombre_aten."' disabled ></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Cargo</label></div>
                                <div class='col-12 col-md-9'><textarea name='cargo' id='textarea-input' rows='1' class='form-control' disabled>".$dato->cargo_aten."</textarea></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Descrición del Oficio</label></div>
                                <div class='col-12 col-md-9'><textarea name='descripcion' id='textarea-input' rows='5' class='form-control' disabled>".$dato->descripcion."</textarea></div>
                            </div>
                            <div class='row form-group'>
                                 <div class='col col-md-3'><label for='file-input' class='form-control-label'> Descargar Archivo Atendido</label></div>
                                 <div class='col-12 col-md-9'><a href='descargarAtendido/".$dato->arch_atendido."' class='fa fa-download fa-2x'></a></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Con copia a </label></div>
                                <div class='col-12 col-md-9'><textarea name='copia' id='textarea-input' rows='1' class='form-control' disabled>".$dato->copia_a."</textarea></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Atención</label></div>
                                    <div class='col-12 col-md-9'><input type='text' id='text-input' class='form-control' value='".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."' disabled>
                                        <input type='text' id='text-input' name='atencion' value='".$dato->atencion."' hidden>
                                    </div>
                            </div>";
                                }    
                                ?>
                        </form>
                    </div><!--footer -->
                </div>
            </div>
        </div> <!--row -->
    </div> <!---animated -->
</div> <!--content mt-3 -->