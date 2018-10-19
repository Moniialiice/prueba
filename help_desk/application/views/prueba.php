<div class="card-body card-block">
    <span>
        <span class="fa fa-file" OnClick="();"></span>
    </span>                          
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Usuario</th>
        <th scope="col">Activo</th>
        <th scope="col">Tipo Usuario</th>
        <th scope="col">Modificar</th>
    </tr>
    </thead>
    <tbody>
    <?php
        if($datos)
        {
            foreach ($datos as $dato) {
                if($dato->activo != 0) {
                    echo "<tr>
                            <th scope='row'>".$dato->id_usuario."</th>".
                            "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                            "<td>".$dato->usuario."</td>".
                            "<td>Activo</td>".
                            "<td align='center'><a href='datosUsuario/".$dato->id_usuario."' class='fa fa-file fa-1x'></a></td>".
                           "</tr>";
                }else{
                    echo "<tr>
                            <th scope='row'>".$dato->id_usuario."</th>".
                            "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                            "<td>".$dato->usuario."</td>" .
                            "<td>Inactivo</td>".
                            "<td align='center'><a href='datosUsuario/".$dato->id_usuario."' class='fa fa-file fa-1x'></a></td>".
                          "</tr>";
                      }
            }
        }    
        ?>
    </tbody>
</table>
    <?php
        /* Se imprimen los números de página */           
        echo $this->pagination->create_links();
    ?>
                                
<!-- carga nomenclatura -->  

                        <form class="search-form" action="nom" method="nom" id="nom">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Selecciona Oficio</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="tipoOficio" id="tipoOficio" class="form-control" OnClick="BusquedaOf();">
                                        <option  value="0" <?php echo set_select('tipoOficio','0');?>>Cordinador Genaral</option>
                                        <option  value="1" <?php echo set_select('tipoOficio','1');?>>Secretario Particular</option>
                                    </select>
                                </div>
                            </div>    
                        </form>
                        <div  class="card-body card-block" id="consecutivo"></div>                 

