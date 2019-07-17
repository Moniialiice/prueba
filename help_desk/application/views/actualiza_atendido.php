<div class='breadcrumbs'>
    <div class='col-sm-4'>
        <div class='page-header float-left'>
            <div class='page-title'>
                <h1>Actualizar Oficio</h1>
            </div>
        </div>
    </div>
    <div class='col-sm-8'>
        <div class='page-header float-right'>
            <div class='page-title'>
                <ol class='breadcrumb text-right'>
                    <?php
                        foreach ($datos as $dato)
                        {
                            $ia = $dato->id_oficioAtendido;
                            $ida = base64_encode($ia);
                            echo "<li><a href='imprimirAtendido/".$ida."' target='_blank' ><img src='assets/img/pdf.png' width='30' height='30'></a></li>";
                    ?>
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
                        <strong>Datos Oficio</strong>
                    </div>
                    <div class='card-body card-block'>
                        <?php
                            //Mensajes
                            if($this->session->flashdata('Creado')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Oficio actualizado correctamente.</label></div>";
                            }
                            if($this->session->flashdata('No')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Oficio no actualizado.</label></div>";                            
                            }
                            if($this->session->flashdata('Error')){
                                echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Datos no recibidos</label></div>";
                            }
                                echo validation_errors();    

                        //echo date('l jS \of F Y h:i:s A');                       
                            //cambia formato de fecha  
                            $date = $dato->fecha_atendido;
                            //corta los datos de d,m,a
                            $ext = explode("-",$date);
                        echo "<form action='modificarAtendido' method='post' enctype='multipart/form-data' class='form-horizontal'>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class=' form-control-label'>Oficio Seguimiento</label></div>";
                                echo "<div class='col-12 col-md-9'>
                                        <input type='text' id='text-input' value='".$dato->nomenclatura_aten."' class='form-control' disabled>
                                        <input type='text' id='text-input' name='aten' value='".$dato->id_oficioAtendido."' hidden>
                                        <input type='text' name= 'nomen' value='".$dato->nomenclatura_aten."' hidden>
                                      </div>
                            </div>";
                        echo"<div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class=' form-control-label'> Fecha Atendido</label></div>
                                <div class='col-12 col-md-9'>
                                    <div class='input-group' >                                        
                                        <input type='text-input' class='form-control' id='date1' value='".$ext[2]."/".$ext[1]."/".$ext[0]."' disabled>
                                        <input type='text' name='old' value='".$dato->fecha_atendido."' hidden>
                                        <span class='input-group-addon'>
                                            <span class='fa fa-calendar'></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class=' form-control-label'>Nueva Fecha Atendido</label></div>
                                <div class='col-12 col-md-9'>
                                    <div class='input-group' >                                        
                                        <input type='text-input' class='form-control' id='date1' name='date1' value='".set_value('date1')."'>
                                        <span class='input-group-addon'>
                                            <span class='fa fa-calendar'></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Nombre</label></div>
                                <div class='col-12 col-md-9'><input type='text' id='text-input' name='nombre' OnKeyUp='Upper(this);'  class='form-control' value='".$dato->nombre_aten."'></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Cargo</label></div>
                                <div class='col-12 col-md-9'><textarea name='cargo' id='textarea-input' rows='1' OnKeyUp='Upper(this);' class='form-control'>".$dato->cargo_aten."</textarea></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Descrición del Oficio</label></div>
                                <div class='col-12 col-md-9'><textarea name='descripcion' id='textarea-input' rows='5' OnKeyUp='Upper(this);''  class='form-control'>".$dato->descripcion."</textarea></div>
                            </div>";
                            if(empty($dato->arch_atendido)){                                
                                echo"
                                <div class='row form-group'>
                                    <div class='col col-md-3'><label for='file-input' class='form-control-label'> Archivo Atendido</label></div>
                                    <div class='col-12 col-md-9'><input id='file-input' name='archivo' class='form-control-file' type='file' ></div>
                                </div>";
                            }else{
                                echo "
                                <div class='row form-group'>
                                    <div class='col col-md-3'><label for='file-input' class='form-control-label'> Descargar Archivo Atendido</label></div>
                                    <div class='col-12 col-md-9'><a href='descargarAtendido/".$dato->arch_atendido."' class='fa fa-download fa-2x'></a><input type='text' value='".$dato->arch_atendido."' name='archivo' hidden></div>
                                </div>";
                            }    
                            echo"
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Con copia a </label></div>
                                <div class='col-12 col-md-9'><textarea name='copia' id='textarea-input' rows='1' class='form-control'>".$dato->copia_a."</textarea></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col col-md-3'><label for='text-input' class='form-control-label'> Atención</label></div>
                                    <div class='col-12 col-md-9'><input type='text' id='text-input' class='form-control' value='".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."'>
                                        <input type='text' id='text-input' name='atencion' value='".$dato->atencion."' hidden>
                                    </div>
                            </div>";
                                }    
                        ?>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div> <!--row -->
    </div> <!---animated -->
</div> <!--content mt-3 -->