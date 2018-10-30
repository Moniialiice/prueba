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
        <th scope="col">Correo Electrónico</th>
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
                    echo "<tr>
                            <th scope='row'>".$dato->id_usuario."</th>".
                            "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                            "<td>".$dato->correo."</td>";
                if($dato->activo !=0) {
                    echo    "<td>Activo</td>".
                            "<td>".$dato->tipoUsuario."</td>";
                }else{
                    echo    "<td>Inactivo</td>".
                            "<td>".$dato->tipoUsuario."</td>";
                }    
                    echo    "<td align='center'><a href='datosUsuario/".$dato->id_usuario."' class='fa fa-file fa-1x'></a></td>".
                           "</tr>";
            }
        }    
        ?>
    </tbody>
</table>
    <?php echo $this->pagination->create_links(); ?>
                                
                   

