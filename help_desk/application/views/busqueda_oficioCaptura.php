<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Consulta Oficio Seguimiento Captura</h1>
            </div>
        </div>
    </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href=""></a></li>
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
                    <strong class="card-title">Búsqueda Oficio Seguimiento Captura</strong>
                </div>
                <div class="card-body card-block">
                    <div class="form-inline">
                        <form class="search-form" action="resultOficio" method="post" id="oficio">
                            <div class="col col-md-5"><label for="text-input" class="form-control-label" >Búsqueda por número de oficio</label></div>
                            <div class="col col-md-5"><input class="form-control mr-sm-3" type="text-input" OnKeyUp="Upper(this);" id="busqueda" name='busqueda'></div>
                            <div class="col col-md-5"><label for="text-input" class="form-control-label"> Fecha Oficio Inicial</label></div>
                            <div class="col col-md-5"><input class="form-control mr-sm-3" type='text-input' class="form-control" id="date1" name="date1"></div>
                            <div class="col col-md-5"><label for="text-input" class=" form-control-label"> Fecha Oficio Final</label></div>
                            <div class="col col-md-5"><input class="form-control mr-sm-3" type="text-input" class="form-control" id="date2" name="date2">
                                <span class="input-group-addon">
                                    <span class="fa fa-search" OnClick="BusquedaOf();"></span>
                                </span>
                            </div>    
                        </form>
                    </div>
                </div>
                <div  class="card-body card-block" id="roficio"></div>
            </div>
        </div>
      </div>
  </div>
</div>
