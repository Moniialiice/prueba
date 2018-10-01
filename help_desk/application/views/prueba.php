
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1> Consulta Oficio Recepción</h1>
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
                        <strong class="card-title">Oficio Recepción</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-inline">
                            <form class="search-form" action="resultEntrada" method="post" id="entrada" name='entrada'>
                                <div class="col col-md-5"><label for="text-input" class="form-control-label" >Búsqueda por número de oficio</label></div>
                                    <input class="form-control mr-sm-3" type="text-input" id="text-input" name='busqueda'>
                                <div class="col col-md-5"><label for="text-input" class="form-control-label"> Fecha</label></div>
                                    <input class="form-control mr-sm-3" type='text-input' class="form-control" id="datepicker" name="date1" require>
                                <div class="col col-md-5"><label for="text-input" class=" form-control-label"> Fecha</label></div>
                                    <input class="form-control mr-sm-3" type="text-input" class="form-control" id="datepickerf" name="date2">
                                <button type="submit" id=""><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div  class="card-body card-block" id="results"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(e){
        $('#entrada').submit(function (e){
            e.preventDefault()
            $('#results').load('resultEntrada' + $('#entrada').serialize()
        })
    });
</script>