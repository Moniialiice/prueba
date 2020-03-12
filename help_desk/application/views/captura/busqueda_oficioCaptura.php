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
                    <!--div class="form-inline"-->
                        <form class="search-form" action="resultCaptura" method="post" id="captura">
                            <div class='row form-group'>
                                <div class='col-12 col-md-2'><label for='text-input' class=' form-control-label'>Número de Oficio</label></div>
                                <div class='col-12 col-md-4'>
                                <input class="form-control" type="text-input" id="busqueda" name='busqueda' OnKeyUp='Upper(this);'></div>
                                <div class='col-12 col-md-2'><label for='text-input' class=' form-control-label'>Solicitud</label></div>
                                <div class='col-12 col-md-4'>
                                <input class="form-control" type="text-input" id="asunto" name='asunto' OnKeyUp='Upper(this);'></div>
                            </div>
                            <div class='row form-group'>
                                <div class='col-12 col-md-3'><label for='text-input' class=' form-control-label'>Fecha Oficio Inicial</label></div>
                                <div class='col-12 col-md-2'>
                                <input class="form-control" type="text-input" id="date1" name='date1' OnKeyUp='Upper(this);'></div>
                                <div class='col-12 col-md-3'><label for='text-input' class=' form-control-label'>Fecha Oficio Final</label></div>
                                <div class='col-12 col-md-2'>
                                <input class="form-control" type="text-input" id="date2" name='date2' OnKeyUp='Upper(this);'></div>
                                <span class="input-group-addon">
                                    <span class="fa fa-search" OnClick="BusquedaCap();"></span>
                                </span>
                            </div>   
                        </form>
                    <!--/div-->
                </div>
                <div  class="card-body card-block" id="rcaptura"></div>
            </div>
        </div>
      </div>
  </div>
</div>
