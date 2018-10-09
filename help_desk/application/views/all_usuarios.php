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
            foreach ($datos as $dato) {
                if($dato->activo !=0) {
                    echo "<tr>
                            <th scope='row'>".$dato->id_usuario."</th>".
                            "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                            "<td>".$dato->usuario."</td>".
                            "<td>Activo</td>".
                            "<td>".$dato->tipoUsuario."</td>".
                            "<td align='center'><a href='datosUsuario/".$dato->id_usuario."' class='fa fa-file fa-1x'></a></td>".
                           "</tr>";
                }else{
                    echo "<tr>
                            <th scope='row'>".$dato->id_usuario."</th>".
                            "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                            "<td>".$dato->usuario."</td>" .
                            "<td>Inactivo</td>".
                            "<td>".$dato->tipoUsuario."</td>".
                            "<td align='center'><a href='datosUsuario/".$dato->id_usuario."' class='fa fa-file fa-1x'></a></td>".
                          "</tr>";
                      }
                }
        ?>
    </tbody>
</table>
                                
                   

