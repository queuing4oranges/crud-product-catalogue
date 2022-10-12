<?php

//procedural PHP
function getConnect()
{          //create fct, call the variables when we need them (would work w/o fct but then we dont know where the variable is coming from)

    $server_name    = "127.0.0.1";
    $mysql_username = "root";
    $mysql_password = "";
    $db_name        = "products_api";

    //connecting to DB
    $conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }

    return $conn;       //returning value to make it accessible outside fct
}
