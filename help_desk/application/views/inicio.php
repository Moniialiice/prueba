<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 22/08/2018
 * Time: 05:09 PM
 */
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h2>Bienvenido</h2>

            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <h1>
                    <?php foreach ($data as $datos){
                        echo $datos->nombre." ".$datos->apellidop." ".$datos->apellidom;
                    }
                    ?>
                </h1>
            </div>
        </div>
    </div>
</div>