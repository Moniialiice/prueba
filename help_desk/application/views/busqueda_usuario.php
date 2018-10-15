<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1> Consulta Usuario</h1>
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
<div class="content mt-5">
  <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Búsqueda Usuario</strong>
                </div>
                <div class="card-body">
                        <div class="form-inline">
                            <form class="search-form" method="post" id="entrada" name='entrada' enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col col-md-5"><label for="text-input" class="form-control-label" >Nombre de usuario</label></div>
                                    <div class="col col-md-5"><input class="form-control mr-sm-3" type="text-input" id="busqueda" name='busqueda'>
                                        <span class="input-group-addon">
                                            <span class="fa fa-search" OnClick="BusquedaUs();"></span>
                                        </span>
                                    </div>
                                </div> 
                            </form>
                        </div>
                </div>
                <div  class="card-body card-block" id="results"></div>
            </div>
        </div>
      </div>
  </div>
</div>