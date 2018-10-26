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
                echo "<tr>
                <th scope='row'>".$dato->no_oficioEntrada."</th>".
                "<td>".$dato->fecha_ent."</td>".
                "<td>".$dato->hora_ent."</td>".
                "<td>".$dato->fecha_real."</td>",
                "<td>".$dato->firma_origen." ".$dato->cargo"</td>".
                "<td>".$dato->peticion."</td>".
                "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                "<td align='center'><a href='descargar/".$dato->arch_entrada."' class='fa fa-download fa-1x'></td>".
                "<td align='center'><a href='nuevoSeguimiento/".$dato->id_oficioEntrada."' class='fa fa-file fa-1x'></td>".
                "</tr>";
            }
        ?>
    </tbody>
</table>
                         
