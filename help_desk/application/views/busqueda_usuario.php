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
                        <form class="search-form" action="consultaUsuario" method="post" id="usuario" name="usuario">
                            <div class="col col-md-5"><label class="search-form label" >Búsqueda por nombre de usuario</label></div>
                            <input class="form-control mr-sm-2" type="text" placeholder="Nombre" id="text-input" name='busqueda'>
                            <button class="search-form mr-sm-2" type="submit" id=""><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div  class="card-body card-block" id="results">
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
<script type='text/javascript'>
   $(function(e){
        $('#usuario').submit(function(e){
            e.preventDefault()
            $('#results').load('muestraUsuario') + $('#usuario').serialize()
        })
    })
</script>