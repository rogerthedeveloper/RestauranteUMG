<?php

include("App.class.php");
include("Model.class.php");
include("Controller.class.php");

/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 24/05/16
 * Time: 14:13
 */

class Api extends Controller  {


    public function all($table) {

        $query = Controller::$connection->query("SELECT * FROM $table");
        $data = $query->fetchAll(PDO::FETCH_NUM);


        header('Content-Type: application/json');

        echo json_encode($data);

    }



    public function create($table, $data) {



            $values = Controller::values($data);

            $query = Controller::$connection->query("INSERT INTO $table $values");
            

        header('Content-Type: application/json');


        if($query) {

            echo json_encode(["Inserted"]);

        }
        else {

            echo json_encode(["Not Inserted"]);

            print_r(Controller::$connection->errorInfo());

        }



    }


    public function update($table, $key, $cod, $data) {


            $setValues = Controller::updateValues($data);

            $query = Controller::$connection->query("UPDATE $table $setValues");



        header('Content-Type: application/json');


        if($query) {

            echo json_encode(["Updated"]);

        }
        else {

            echo json_encode(["Not Updated"]);

            print_r(Controller::$connection->errorInfo());

        }




    }


    public function delete($table, $key, $cod) {

        $query = Controller::$connection->query("DELETE FROM $table WHERE $key = '$cod'");


        header('Content-Type: application/json');

        if($query) {

            echo json_encode(["Deleted"]);

        }
        else {

            echo json_encode(["Not Deleted"]);

            print_r(Controller::$connection->errorInfo());

        }


    }


    public function prev($table, $key, $cod) {

        $query = Controller::$connection->query("SELECT * FROM $table WHERE $key < '$cod' AND ROWNUM = 1 ORDER BY $key DESC");
        $data = $query->fetchAll(PDO::FETCH_ASSOC);


        header('Content-Type: application/json');

        echo json_encode($data);

    }


    public function next($table, $key, $cod) {

        if(!$cod) {

            $cod = 0;

        }

        $query = Controller::$connection->query("SELECT * FROM $table WHERE $key > '$cod' AND ROWNUM = 1 ORDER BY $key ASC");

        $data = $query->fetchAll(PDO::FETCH_ASSOC);


        header('Content-Type: application/json');

        echo json_encode($data);

    }





    public function reservar($data) {

        $restaurante_id = $data["tpr_restaurante_id"];
        $fecha = $data["tpr_restaurante_fecha"];
        $tipo = $data["tpr_restaurante_tipo"];
        $sillas_min = $data["tpr_restaurante_no_min_sillas"];
        $mesa_id = $data["tpr_restaurante_id_mesa"];
        $nombres = $data["tpr_restaurante_nombre_reservacion"];
        $apellidos = $data["tpr_restaurante_apellido_reservacion"];

        $query = Controller::$connection->query("INSERT INTO CLIENTE 

            VALUES('', '$nombres', '$apellidos')

        ");

        $query = Controller::$connection->query("SELECT ID FROM CLIENTE ORDER BY ID DESC");
        $lastId = $query->fetch(PDO::FETCH_NUM);


        $query = Controller::$connection->query("UPDATE MESA SET 

            ESTADO_ID = 2 WHERE ID = $mesa_id AND RESTAURANTE_ID = $restaurante_id

        ");
            

        header('Content-Type: application/json');


        if($query) {

            echo json_encode(["Reservada"]);

            $query = Controller::$connection->query("INSERT INTO MESA_RESERVA 

            VALUES('', $lastId[0], $restaurante_id, $mesa_id, '$fecha')

            ");

        }
        else {

            echo json_encode(["No Reservada"]);

            print_r(Controller::$connection->errorInfo());

        }



    }



}

    if(isset($_POST["data"]) && isset($_GET["action"])) {

        $data = $_POST["data"];

        if(isset($_POST["table"])) {


            $table = $_POST["table"];

            $key = $_POST["key"];

            $cod = $_POST["cod"];

        }

        $action = $_GET["action"];

        $request = new Api();


        switch ($action) {

            case 'all':

                $request->all($table);

                break;
            case 'create':

                $request->create($table, $data);

                break;
            case 'update':

                $request->update($table, $key, $cod, $data);

                break;
            case 'delete':

                $request->delete($table, $key, $cod);

                break;
            case 'prev':

                $request->prev($table, $key, $cod);

                break;
            case 'next':

                $request->next($table, $key, $cod);

                break;



            case 'reservar':

                $request->reservar($data);

            break;

        }



    }


