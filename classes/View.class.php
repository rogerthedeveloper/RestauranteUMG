<?php

/**
 * Created by PhpStorm.
 * User: RSpro
 * Date: 22/05/16
 * Time: 14:01
 */


class View extends App
{

    public static function showFormFromTable($table_name, $table_title, $layout = "form_default", $options = false)  {


        include("../assets/layouts/tables/".$layout.".php");


    }

        public static function showView($layout = "form_default")  {


        include("../assets/layouts/views/".$layout.".php");


    }

}

new View();