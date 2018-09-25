<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1> Consulta de Usuario</h1>
            </div>
        </div>
    </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="nuevoUsuario">Nuevo Usuario</a></li>
					</ol>
				</div>
			</div>
		</div>
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Usuarios</strong>
                </div>
                <div class="card-body">
                    <div class="form-inline">
                        <form class="search-form" action="muestraUsuario" method="post" id="usuario">
                            <div class="col col-md-5"><label class="search-form label" >Búsqueda por nombre o usuario</label></div>
                            <input class="form-control mr-sm-2" type="text" placeholder="Nombre o Usuario" id="text-input" name='busqueda'>
                            <button class="search-form" type="submit" id=""><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div  class="card-body card-block" id="results"></div>
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
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
                   

