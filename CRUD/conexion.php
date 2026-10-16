<?php

function conectar() {
    /* Informacion del servidor */
    $host="localhost";
    $user="root";
    $pass="";

    /* Base de datos */
    $db="aw_tiid221";

    /* Permitir conectarnos a MySQL */
    $con=mysqli_connect($host,$user,$pass);

    /* Le vamos a decir que BD y la informacion de */
    mysqli_select_db($con,$db);

    return $con;
}
?>