<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1> Consulta Oficio Seguimiento</h1>
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
                    <strong class="card-title">Búsqueda Oficio Seguimiento</strong>
                </div>
                <div class="card-body">
                    <div class="form-inline">
                        <form class="search-form" action="resultOficio" method="post" id="oficio">
                        <div class="col col-md-5"><label for="text-input" class="form-control-label" >Búsqueda por número de oficio</label></div>
                                    <input class="form-control mr-sm-3" type="text-input" id="busqueda" name='busqueda'>
                                <div class="col col-md-5"><label for="text-input" class="form-control-label"> Fecha Inicial</label></div>
                                    <input class="form-control mr-sm-3" type='text-input' class="form-control" id="datepicker" name="datepicker">
                                <div class="col col-md-5"><label for="text-input" class=" form-control-label"> Fecha Final</label></div>
                                    <input class="form-control mr-sm-3" type="text-input" class="form-control" id="datepickerf" name="datepickerf">
                                <span class="input-group-addon">
                                    <span class="fa fa-search" OnClick="BusquedaOf();"></span>
                                </span>
                        </form>
                    </div>
                    <div  class="card-body card-block" id="roficio"></div>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
