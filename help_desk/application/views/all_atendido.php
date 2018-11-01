<table class="table">
    <thead>
        <tr>
            <th scope="col">No. Oficio Seguimiento</th>
            <th scope="col">Fecha Atendido</th>
            <th scope="col">Asunto</th>
            <th scope="col">Dirigido a</th>
            <th scope="col">Descripción</th>
            <th scope="col">Atención</th>
            <th scope="col">Descargar</th>
            <th scope="col">Imprimir</th>
        </tr>
    </thead>
    <tbody>
        <?php            
            foreach ($datos as $dato) {
                //obtenemos fecha 
                $date = $dato->fecha_atendido;
                //corta los datos de d,m,a
                $ext = explode("-",$date);
                echo "<tr>
                <th scope='row'>".$dato->nomenclatura."</th>".
                "<td>".$ext[2]."/".$ext[1]."/".$ext[0]."</td>".
                "<td>".$dato->asunto."</td>".
                "<td>".$dato->nombre_aten." ".$dato->cargo_aten."</td>".
                "<td>".$dato->descripcion."</td>".
                "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                "<td align='center'><a href='descargarAtendido/".$dato->arch_atendido."' class='fa fa-download fa-1x'></td>".
                "<td align='center'><a href='imprimir/".$dato->id_oficioAtendido."' class='fa fa-file fa-1x'></td>".
                "</tr>";
            }
        ?>
    </tbody>
</table>
                         
