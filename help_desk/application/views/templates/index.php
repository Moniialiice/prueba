<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 22/08/2018
 * Time: 03:47 PM
 */
?>
<div class="content mt-6 ">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Iniciar Sesión</div>
                    <div class="card-body card-block">
                        <form action="iniciando" method="post" class="">
                            <div class="form-group">
                                <div class="input-group">
                                    <!--div class="input-group-addon">Usuario</div-->
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <!--div class="input-group-addon">Password</div-->
                                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>