<?php
/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 22/05/16
 * Time: 15:31
 */


/* Form Construct Data */


try {

    $registries = Controller::$connection->query("SELECT * FROM $table_name");

    $registries = $registries->fetchAll(PDO::FETCH_NUM);


}


catch(mysqli_sql_exception $e) {

    echo $e->getMessage();

}

/* End Form Construct Data */


?>

<div id="<?php echo $table_name; ?>" class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>

            <a data-toggle="collapse" data-target="#<?php echo $table_name."-panel"; ?>">
                <?php echo $table_title; ?>
            </a>

        </h3>

    </div>

    <div id="<?php echo $table_name."-panel"; ?>" class="panel-collapse collapse in">

    <div class="panel-body">


    <div class="col-md-<?php if($options["photo"] == true) { echo "8"; } else { echo "12"; } ?>">

        <div class="well">


            <div class="inputs_wrapper">

     
        <div class="form-group">

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </span>
                <input id="ID" type="text" class="form-control" placeholder="ID" aria-describedby="basic-addon">
            </div>

        </div>

        <div class="form-group">

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </span>
                <input id="NOMBRE" type="text" class="form-control" placeholder="NOMBRE" aria-describedby="basic-addon">
            </div>

        </div>


            </div>

            <button id="create" type="button" class="create btn btn-primary btn-md btn-lg center-block">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Agregar Restaurante
            </button>


        </div>


    </div>

        <?php if($options["photo"] == true): ?>

            <div class="col-md-4">

                <div class="well">

                    <div style="text-align: center;">

                    <img class="form_image" src="../assets/img/no_pic.jpg">

                    </div>

                </div>


            </div>

        <?php endif; ?>

        <?php if($options["detail"] == true): ?>

        <div class="col-md-12">

            <div class="well">


            <table class="detail_table display" cellspacing="0" width="100%">
                <thead>
                <tr>

                    <th>ID</th>
                    <th>NOMBRE</th>


                </tr>
                </thead>

                <tbody>


                <?php foreach($registries as $key => $value): ?>
                <tr>


                    <?php foreach($value as $key => $value): ?>
                        <td><?php echo $value; ?></td>
                    <?php endforeach; ?>



                </tr>
                <?php endforeach; ?>



                </tbody>



            </table>

                </div>

        </div>

        <?php endif; ?>

    </div>



    <div class="panel-footer">

        <div style="text-align: center;">

        <button id="new" type="button" class="new btn btn-success btn-md">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo Restaurante
        </button>

        <button id="update" type="button" class="update btn btn-info btn-md" disabled>
            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar Restaurante
        </button>

        <button id="delete" type="button" class="delete btn btn-danger btn-md" disabled>
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar Restaurante
        </button>

        <button id="prev" type="button" class="prev btn btn-warning btn-md">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Prev
        </button>

        <button id="next" type="button" class="next btn btn-warning btn-md">
            Next <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </button>

        </div>

    </div>

    </div>

</div>


