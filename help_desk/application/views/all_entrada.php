<table class="table">
    <thead>
        <tr>
            <th scope="col">No. Oficio</th>
            <th scope="col">Fecha Recepción</th>
            <th scope="col">Hora Recepción</th>
            <th scope="col">Fecha Real</th>
            <th scope="col">Firma Origen</th>
            <th scope="col">Petición</th>
            <th scope="col">Atención</th>
            <th scope="col">Descargar</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php            
            foreach ($datos as $dato) {
                $date = $dato->fecha_ent;
                //corta los datos de d,m,a
                $ext = explode("-",$date);
                $date2 = $dato->fecha_real;
                $ext2 = explode("-",$date2); 
                echo "<tr>
                <th scope='row'>".$dato->no_oficioEntrada."</th>".
                "<td>".$ext[2]."/".$ext[1]."/".$ext[0]."</td>".
                "<td>".$dato->hora_ent."</td>".
                "<td>".$ext2[2]."/".$ext2[1]."/".$ext2[0]."</td>".
                "<td>".$dato->firma_origen." ".$dato->cargo."</td>".
                "<td>".$dato->peticion."</td>".
                "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                "<td align='center'><a href='descargar/".$dato->arch_entrada."' class='fa fa-download fa-1x'></td>".
                "<td align='center'><a href='nuevoSeguimiento/".$dato->id_oficioEntrada."' class='fa fa-file fa-1x'></td>".
                "</tr>";
            }
        ?>
    </tbody>
</table>
                         
