<?php
/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 22/05/16
 * Time: 15:31
 */


?>

<div class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>

                Terminal Punto de Reserva (TPR)

        </h3>

    </div>

    <div class="panel-body">

        <ul class="bxslider tpr">

            <li>

            <div class="col-md-12">
                <h1 class="text-center">Bienvenido al TPR!</h1>
            </div>

            <center>

            <button onclick="tpr_restaurante();" type="button" class="btn btn-primary btn-md">
                    Comenzar
            </button>

            </center>
                

            </li>

            <li>

            <div class="col-md-4">

                <button onclick="tpr_restaurante(1, 'restaurante');" type="button" class="btn btn-default btn-md btn-block">
                    <center><img src="../assets/img/burger-king.png" class="restaurante-logo"></center>
                </button>
                

            </div>
            <div class="col-md-4">

                <button onclick="tpr_restaurante(2, 'restaurante');" type="button" class="btn btn-default btn-md btn-block">
                    <center><img src="../assets/img/mcdonalds.png" class="restaurante-logo"></center>
                </button>                
                
            </div>
            <div class="col-md-4">
                
                <button onclick="tpr_restaurante(3, 'restaurante');" type="button" class="btn btn-default btn-md btn-block">
                    <center><img src="../assets/img/pollo-campero.png" class="restaurante-logo"></center>
                </button>

            </div>

            

            <div class="col-md-12">

            <center>

            <br/>

            <button onclick="tpr_restaurante(true, 'cancelar')" type="button" class="btn btn-danger btn-md">
                    Cancelar Reservación
            </button>

            </center>

            </div>


            </li>
            <li>

            <div class="col-md-6 col-md-offset-3">
                <h1 class="text-center">¿Qué fecha y hora desea reservar?</h1>
            

            <center>

                <div class="form-group">

                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        </span>
                        <input name="FECHA" id="FECHA" type="text" class="form-control datepicker" placeholder="Fecha y hora de la reserva?" aria-describedby="basic-addon">
                    </div>

                </div>

            </center>

            <center><img src="../assets/img/clock.png" class="restaurante-logo"></center>

            <center>
            <br/>
            <button onclick="tpr_restaurante(FECHA.value, 'fecha');" type="button" class="btn btn-primary btn-md">
                    Aceptar
            </button>

            </center>

            </div>
                

            </li>
            <li>

            <div class="col-md-12">
                <h1 class="text-center">¿Necesita mesa para fumadores?</h1>
            </div>

            <center>

            <button onclick="tpr_restaurante(2, 'tipo_mesa');" type="button" class="btn btn-primary btn-md">
                    Sí
            </button>
            <button onclick="tpr_restaurante(1, 'tipo_mesa');" type="button" class="btn btn-primary btn-md">
                    No
            </button>

            </center>
                

            </li>

            <li>

            <div class="col-md-6 col-md-offset-3">
                <h1 class="text-center">¿Cúantas personas van a ocupar la mesa?</h1>
            
                <div class="form-group">

                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </span>
                        <input name="NO_SILLAS" id="NO_SILLAS" type="text" class="form-control" placeholder="No. de personas?" aria-describedby="basic-addon">
                    </div>

                </div>

            <center>

            <button onclick="tpr_restaurante(NO_SILLAS.value, 'no_personas');" type="button" class="btn btn-primary btn-md">
                    Aceptar
            </button>

            </center>

            </div>
                

            </li>

            <li>

            <div class="col-md-12">
                <h1 class="text-center">¿En cúal de estas mesas disponibles prefiere sentarse?</h1>
            </div>

            <center>

            <button onclick="tpr_restaurante(1, 'mesa_id');" type="button" class="btn btn-primary btn-md">
                    Aceptar
            </button>

            </center>
                

            </li>

            <li>

            <div class="col-md-6 col-md-offset-3">

                <h1 class="text-center">¿A que Nombre la Reservación?</h1>            

            <center>

            <div class="form-group">

                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </span>
                        <input name="NOMBRE_RESERVACION" id="NOMBRE_RESERVACION" type="text" class="form-control" placeholder="Nombres" aria-describedby="basic-addon">
                    </div>
            </div>


            <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </span>
                        <input name="APELLIDO_RESERVACION" id="APELLIDO_RESERVACION" type="text" class="form-control" placeholder="Apellidos" aria-describedby="basic-addon">
                    </div>

            </div>

            <button onclick="tpr_restaurante(NOMBRE_RESERVACION.value, 'nombre_reservacion'); tpr_restaurante(APELLIDO_RESERVACION.value, 'apellido_reservacion');" type="button" class="btn btn-primary btn-md">
                    Aceptar
            </button>

            </center>

            </div>
                

            </li>

            <li>

            <div class="col-md-12">
                <h1 class="text-center">Revisemos una vez más...</h1>
            </div>

            <center>

            <button onclick="tpr_restaurante(true, 'reservar')" type="button" class="btn btn-success btn-md">
                    Confirmar Reservación
            </button>

            <button onclick="tpr_restaurante(true, 'cancelar')" type="button" class="btn btn-danger btn-md">
                    Cancelar Reservación
            </button>

            </center>
                

            </li>
            <li>

            <div class="col-md-12">
                <h1 class="text-center">Es toda tuya...</h1>
            </div>

            <center>

            <button onclick="tpr_restaurante(true, 'cancelar')" type="button" class="btn btn-success btn-md">
                    Aceptar
            </button>

            </center>
                

            </li>

        </ul>


    </div>

</div>


