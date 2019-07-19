<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 22/08/2018
 * Time: 03:47 PM
 */
?>
<!--div class="content mt-6 ">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6"-->
                <!--div class="card"-->
                    <img src='assets/img/header.png' class='img'><h2 align='center'>Sistema de Gestión de Oficios</h2>                    
                    <div class="card-body card-block">
                        <form action="verificar" method="post" class="">
                            <div class="form-group">
                                <div class="input-group">
                                    <!--div class="input-group-addon">Usuario</div-->
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php echo set_value('email');?>" >
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
                            <div class = "alert">
                                <?php
                                    if($this->session->flashdata('Activo')){
                                        echo "Usuario inactivo, consultar administrador <br>";
                                    }
                                    if($this->session->flashdata('Error')){
                                        echo "Verificar correo o contraseña. <br>";
                                    }
                                    if($this->session->flashdata('UP')){
                                        echo "Usuario o Contraseña Incorrectos";
                                    }
                                    echo validation_errors();
                                ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer" align ="center">Dirección de Tecnologías de la Información de la Fiscalía General de Justicia Estado de México. Tel. 226 16 00 Ext. 3259</div>
                                    
            <!--/div>
        </div>
    </div>
</div-->