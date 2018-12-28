<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1> </h1>
            </div>
        </div>
    </div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
                    <span class="input-group-addon">
                        <span class="fa " target='_blank' OnClick="ReportOS();">example</span>
                    </span>  
                </ol>
			</div>
		</div>
	</div>
</div>

<table class="table animated fadeIn">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo Electrónico</th>
        <th scope="col">Activo</th>
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
                            "<td>".$dato->correo."</td>".
                            "<td>Activo</td>".
                            "<td align='center'><a href='datosUsuario/".$dato->id_usuario."' class='fa fa-plus fa-1x'></a></td>".
                           "</tr>";
                }else{
                    echo "<tr>
                            <th scope='row'>".$dato->id_usuario."</th>".
                            "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                            "<td>".$dato->correo."</td>" .
                            "<td>Inactivo</td>".
                            "<td align='center'><a href='datosUsuario/".$dato->id_usuario."' class='fa fa-plus fa-1x'></a></td>".
                          "</tr>";
                      }
            }
        }    
        ?>
    </tbody>
</table>
<nav aria-label="Page navigation ">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#results" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Anterior</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#results">1</a></li>
    <li class="page-item"><a class="page-link" href="#results">2</a></li>
    <li class="page-item"><a class="page-link" href="#results">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#results" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Siguiente</span>
      </a>
    </li>
  </ul>
</nav>
    <?php
        /* Se imprimen los números de página */           
        //echo $this->pagination->create_links();
    ?>
