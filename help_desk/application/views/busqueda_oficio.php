<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Consulta Oficio Seguimiento</h1>
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
                <div class="card-body card-block">
                    <div class="form-inline">
                        <form class="search-form" action="resultOficio" method="post" id="oficio">
                            <div class="col col-md-5"><label for="text-input" class="form-control-label" >Número de Oficio</label></div>
                            <div class="col col-md-5"><input class="form-control" type="text-input" OnKeyUp="Upper(this);" id="busqueda" name='busqueda'></div>
                            <!--div class="col col-md-5"><label for="text-input" class="form-control-label" >Dirigido a</label></div>
                            <div class="col col-md-5">
                                <select name="dirigido" id="dirigido" class="form-control" >
                                    <option  value="1" <?php echo set_select('dirigido','1');?>>TODOS</option>
                                    <option  value="2" <?php echo set_select('dirigido','2');?>>CONASE</option>
                                    <option  value="3" <?php echo set_select('dirigido','3');?>>Valle de Toluca</option>                                    
                                    <option  value="4" <?php echo set_select('dirigido','4');?>>Valle de México</option>                                    
                                    <option  value="5" <?php echo set_select('dirigido','5');?>>Zona Oriente</option>
                                    <option  value="6" <?php echo set_select('dirigido','6');?>>Fiscal General</option>
                                    <option  value="7" <?php echo set_select('dirigido','7');?>>Vicefiscalia</option>
                                    <option  value="8" <?php echo set_select('dirigido','8');?>>Oficialia Mayor</option>
                                    <option  value="9" <?php echo set_select('dirigido','9');?>>Depto. Inf. y Estad.</option>
                                    <option  value="10" <?php echo set_select('dirigido','10');?>>Central Juridico</option>
                                    <option  value="11" <?php echo set_select('dirigido','11');?>>Servicio Carrera</option>
                                    <option  value="12" <?php echo set_select('dirigido','12');?>>Valle de Toluca</option>
                                    <option  value="13" <?php echo set_select('dirigido','13');?>>Otra</option>
                                </select>
                            </div-->
                            <div class="col col-md-5"><label for="text-input" class="form-control-label" >Registro de Turno</label></div>
                            <div class="col col-md-5">
                                <select name="tipoCon" id="tipoCon" class="form-control" >
                                    <option  value="1" <?php echo set_select('tipoCon','1');?>>TODOS</option>
                                    <option  value="2" <?php echo set_select('tipoCon','2');?>>TURNADO</option>
                                    <option  value="3" <?php echo set_select('tipoCon','3');?>>TURNO ATENDIDO</option>
                                </select>
                            </div>
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
