<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/restaurante/views/tpr.php">eRestaurante</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">

                <li><a href="http://localhost/restaurante/views/tpr.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> TPR</a></li>

                <li><a href="http://localhost/restaurante/views/control_de_reservaciones.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Control de Reservaciones</a></li>

                <li><a href="http://localhost/restaurante/views/control_de_ingredientes.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Control de Ingredientes</a></li>

                <li><a href="http://localhost/restaurante/views/ordenes_de_mesa.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Ordenes de Mesa</a></li>

                <li><a href="http://localhost/restaurante/views/pagos_de_mesa.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Pagos de Mesa</a></li>
               
                <li id="section_Tables" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Datos <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <?php

                            $files = glob('../tables/*.php', GLOB_BRACE);
                            foreach($files as $file):

                                $name = ucfirst(substr(basename($file), 0, -4));



                        ?>

                                <li id="<?php echo $name; ?>"><a href="<?php echo $file; ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $name; ?></a></li>

                        <?php endforeach; ?>

                        <?php if(!$files): ?>

                            <li><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a></li>

                        <?php endif; ?>



                    </ul>
                </li>

    


            </ul>

            <ul class="nav navbar-nav navbar-right">


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>