                                                       
<?php

// PROGRAMA DE VALIDACION DE USUARIOS
                   
                                                       
$login = $_POST["login1"];
$passwd = $_POST["passwd1"];

$passwd_comp = $passwd;
session_start();

//echo "login es...".$login;
//echo "password es...".$passwd;

include ("conectar.php");

$mysqli = new mysqli("localhost","root","","eml");
       
$sql = "SELECT * from usuario where cedula = '$login'";
$result1 = $mysqli->query($sql);
$row1 = $result1->fetch_array(MYSQLI_NUM);
$numero_filas = $result1->num_rows;
if ($numero_filas > 0)
  {
    $passwdc = $row1[5];
    if ($passwdc == $passwd_comp)
      {
        $_SESSION["autenticado"]= "SIx3";
        $tipo_u = $row1[1];
        $nombre_usuario = $row1[2];
        $apellido= $row1[3];
        $sql2 = "SELECT * from tipo_u where id_tipou='$tipo_u'";
        $result2 = $mysqli->query($sql2);
        $row2 = $result2->fetch_array(MYSQLI_NUM);
        $desc_tipo_usu = $row2[1];
        $_SESSION["id_tipou"]= $desc_tipo_usu;
        $_SESSION["nombre"]= $nombre_usuario;
        $_SESSION["apellido"]= $apellido;
        $_SESSION["id_u"]= $row1[0];  
        if ($tipo_u == 1)   
            header("Location: gestion_usuarios.php");
         else
            header("Location: conteo.php");
      }
    else 
     {
      header('Location: index1.php?mensaje=1');
     }
  }
else
  {
    header('Location: index1.php?mensaje=2');
 }  
?>
