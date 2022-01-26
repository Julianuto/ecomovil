<?php
include "conectar.php";

session_start();
if ($_SESSION["autenticado"] != "SIx3")
    {
      header('Location: index1.php?mensaje=3');
    }
else
    {
        $mysqli = new mysqli("localhost","root","","eml");
        $sqlusu = "SELECT * from tipo_u where id_tipou='2'";
        $resultusu = $mysqli->query($sqlusu);
        $rowusu = $resultusu->fetch_array(MYSQLI_NUM);
  	     $desc_tipo_usuario = $rowusu[1];
        if ($_SESSION["id_tipou"] != $desc_tipo_usuario)
          header('Location: index1.php?mensaje=4');
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 	Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
     <html>
       <head>
          <link rel="stylesheet" href="css/estilos_virtual.css" 			type="text/css">
           <title> Recompensas</title>
        <style>
        .boton {
        padding:10px;
        background:black;
        color:#FFFFFF;
        font:bold 10px/10px verdana;
        width:100px;
        cursor:pointer;
        cursor:hand;
        text-align:center;
       }
    
     #boton1 {
        position:absolute;
        left: 48%;
        top: 85%;
     }
    
     #boton2 {
        position:absolute;
        left: 20%;
        top: 85%;
     }
     #boton3 {
        position:absolute;
        left: 77%;
        top: 85%;      
     }
     #puntaje{
         background:transparent;
         color:white;
         position:absolute;
         left: 30%;
         top: 10%;
     }

</style>
          <link rel="stylesheet" href="css/estilos_virtual.css" 			type="text/css">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           <td valign="top" align=right>
              <h1><font FACE="Century Gothic" SIZE=4 color="#FFFFFF"> <b><?php  echo "Nombre</u>: ".$_SESSION["nombre"]."  ".$_SESSION["apellido"];?> </b></font><br></h1>
              <font FACE="Century Gothic" SIZE=1 color="#FFFFFF"> <b><a href="cerrar_sesion.php" class="boton btn btn-secondary"> Cerrar Sesion </a></b></font>

           </td>
       </head>
       <body background="../img/2.png">
       <?php
       $id_usu= $_SESSION["id_u"];
       $mysqli = new mysqli("localhost","root","","eml");
       $sqlusu = "SELECT * from usuario where id_u='$id_usu'";
       $resultusu = $mysqli->query($sqlusu);
       $rowusu = $resultusu->fetch_array(MYSQLI_NUM);
  	    $puntos = $rowusu[6];
       ?>
       <h1 id="puntaje">Su cantidad de puntos actual es: <?php echo $puntos; ?></h1>
       <a href="reclamar.php?recompensa=1"><button id="boton2">CONDONES</button></a>
       <a href="reclamar.php?recompensa=3"><button id="boton3">RECARGAS</button></a>
       <a href="reclamar.php?recompensa=2"><button id="boton1">PUNTOS</button></a>
       </body>