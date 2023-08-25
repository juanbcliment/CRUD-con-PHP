<?php

session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_movimientos');

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

/* if(isset($mysqli)){
    echo "la base de datos esta conectada";
} */

if($mysqli === false){
    die("Error: No se pudo conectar con el servido" . $mysqli->connect_error);
}
