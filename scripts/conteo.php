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
       <style>
        .boton {
        background:white;
        color:white;}
        .text {
         position:absolute;
        left: 15%;
        top: 85%;
        }
        .boton1 {
         position:absolute;
        left: 40%;
        top: 85%;
        }
        .boton2 {
         position:absolute;
        left: 37%;
        top: 92%;
        }
        .text1 {
         position:absolute;
        left: 55%;
        top: 85%;
        }
        </style>
          <link rel="stylesheet" href="css/estilos_virtual.css" 			type="text/css">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           <title> Conteo</title>
           <td valign="top" align=right>
           <h1><font FACE="Century Gothic" SIZE=4 color="#FFFFFF"> <b><?php  echo "Nombre</u>: ".$_SESSION["nombre"]."  ".$_SESSION["apellido"];?> </b></font><br></h1>
              <font FACE="Century Gothic" SIZE=1 color="#FFFFFF"> <b><a href="cerrar_sesion.php" class="boton btn btn-secondary"> Cerrar Sesion </a></b></font>

           </td>
           
        </head>
       <body background="../img/4.png">
       <?php
 $id=$_SESSION["id_u"];
 $mysqli = new mysqli("localhost","root","","eml");
              $sqlusu1 = "SELECT * from puntos_prov where id_p='1'";
              $resultusu1 = $mysqli->query($sqlusu1);
              $rowusu1 = $resultusu1->fetch_array(MYSQLI_NUM);
              $disp = $rowusu1[1];
              $disp1=$rowusu1[2];

if ((isset($_POST["enviado"])))
  {
   //echo "grabar cambios modificaci�n";
   $puntosl = $disp1;
   $puntosb = $disp;
   $mysqli = new mysqli("localhost","root","","eml");
   $sqlusu = "SELECT * from usuario where id_u='$id'";
   $resultusu = $mysqli->query($sqlusu);
   $rowusu = $resultusu->fetch_array(MYSQLI_NUM);
   $puntos = $rowusu[6];
   $puntos = $puntos+$puntosl+$puntosb;
   $sql = "UPDATE USUARIO SET puntos='$puntos' WHERE ID_u='$id'";
   $result1 = $mysqli->query($sql);
   $sql1 ="UPDATE puntos_prov SET puntos1='0',puntos2='0' WHERE ID_P='1'";
   $result2 = $mysqli->query($sql1);
   header('Location: recompensas.php');
   
}

else

{
  if ((isset($_POST["salida"])))
    {
    //echo "grabar cambios modificacion";
    $puntosl = $disp1;
   $puntosb = $disp;
   $mysqli = new mysqli("localhost","root","","eml");
   $sqlusu = "SELECT * from usuario where id_u='$id'";
   $resultusu = $mysqli->query($sqlusu);
   $rowusu = $resultusu->fetch_array(MYSQLI_NUM);
   $puntos = $rowusu[6];
   $puntos = $puntos+$puntosl+$puntosb;
   $sql = "UPDATE USUARIO SET puntos='$puntos' WHERE ID_u='$id'";
   $result1 = $mysqli->query($sql);
   $sql1 ="UPDATE puntos_prov SET puntos1='0',puntos2='0' WHERE ID_P='1'";
   $result2 = $mysqli->query($sql1);
    header('Location: cerrar_sesion.php');
   }
   else

  {
   ?>

    <tr valign="top">
       <form method=POST action="conteo.php">
       <?php 
              $mysqli = new mysqli("localhost","root","","eml");
              $sqlusu1 = "SELECT * from puntos_prov where id_p='1'";
              $resultusu1 = $mysqli->query($sqlusu1);
              $rowusu1 = $resultusu1->fetch_array(MYSQLI_NUM);
              $disp = $rowusu1[1];
              $disp1=$rowusu1[2];
              ?>
       <input type="text" class="text" readonly="readonly" name="puntos1" value="<?php echo $disp ?>"> <!--<?php  echo $disp ?>-->
       <input type="text" class="text1" readonly="readonly" name="puntos2" value="<?php echo $disp1 ?>">      
	       <input type="hidden" value="S" name="enviado">
         <table width=50% align=center border=0>
           <tr>
             <input type=submit value="Canjear" name="Modificar" class="boton1 btn btn-secondary">
           
          </form>
             </td>
             <td align=center>
             <form method=POST action="conteo.php">
        <input type="hidden" value="S" name="salida">
        <input type=submit value="Guardar puntos y salir" name="Modificar1" class="boton2 btn btn-secondary">
        </form>
             </td>
           </tr>
      </table>

<?php
 }
}
?>
       </body>
      </html>