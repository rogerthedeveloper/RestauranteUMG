<?php

/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 22/05/16
 * Time: 14:58
 */

class App
{
    static $connection;


    public function __construct()   {

    $tns = " 
    (DESCRIPTION =
        (ADDRESS_LIST =
          (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
        )
        (CONNECT_DATA =
          (SERVICE_NAME = xe)
        )
      )
           ";
    $db_username = "system";
    $db_password = "1234";

    App::$connection = new PDO("oci:dbname=".$tns,$db_username,$db_password);


    }

    static function status() {


        if(App::$connection) {

        echo "Connected!";

        }

        else {

            echo "Not Connected!";
        }


    }



}


