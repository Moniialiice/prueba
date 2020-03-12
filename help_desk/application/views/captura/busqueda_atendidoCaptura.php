<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Consulta Oficio Atendido Captura</h1>
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
                    <strong class="card-title">Búsqueda Oficio Atendido Captura</strong>
                </div>
                <div class="card-body card-block">
                    <!--div class="form-inline"-->
                        <form class="search-form" action="" method="post" id="atendidos" name="atendidos">
                            <div class='row form-group'>
                                <div class='col-12 col-md-2'><label for='text-input' class=' form-control-label'>Número Oficio</label></div>
                                <div class='col-12 col-md-3'>
                                <input class="form-control" type="text-input" id="busqueda" name='busqueda' OnKeyUp='Upper(this);'></div>
                                <div class='col-12 col-md-2'><label for='text-input' class=' form-control-label'>Descripción</label></div>
                                <div class='col-12 col-md-5'>
                                <input class="form-control" type="text-input" id="desc" name='desc' OnKeyUp='Upper(this);'></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col-12 col-md-3'><label for='text-input' class=' form-control-label'>Fecha Atendido Inicial</label></div>
                                <div class='col-12 col-md-2'>
                                <input class="form-control" type="text-input" id="date1" name='date1' OnKeyUp='Upper(this);'></div>
                                <div class='col-12 col-md-3'><label for='text-input' class=' form-control-label'>Fecha Atendido Final</label></div>
                                <div class='col-12 col-md-2'>
                                <input class="form-control" type="text-input" id="date2" name='date2' OnKeyUp='Upper(this);'></div>
                                <span class="input-group-addon">
                                    <span class="fa fa-search" OnClick="BusquedaAts();"></span>
                                </span>
                            </div>  
                        </form>
                    <!--/div-->
                </div>
                <div  class="card-body card-block" id="ratendidos"></div>
            </div>
        </div>
      </div>
  </div>
</div>
