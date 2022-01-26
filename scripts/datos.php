<?php
include "conectar.php";  // Conexión tiene la información sobre la conexión de la base de datos.
$mysqli = new mysqli("localhost","root","","eml"); // Aquí se hace la conexión a la base de datos.
$disp = $_GET["disponible"];
$sql1 = "UPDATE puntos_prov SET puntos1='$disp' WHERE ID_P='1'"; // Aquí se ingresa el valor recibido a la base de datos.
echo "sql1...".$sql1; // Se imprime la cadena sql enviada a la base de datos, se utiliza para depurar el programa php, en caso de algún error.
$result1 = $mysqli->query($sql1);
echo "Ingreso exitosos a la base, result..".$result1;
?>