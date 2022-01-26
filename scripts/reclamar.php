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
<body background="../img/3.png">
       <?php
       if ((isset($_POST["enviado"])))
       {
           $mysqli = new mysqli("localhost","root","","eml");
           $id_usu= $_SESSION["id_u"];
           $numero = $_POST["numero"];
           $operador =  $_POST["operador"];
           
           $bandera=0;
           $sqlusu = "SELECT * from usuario where id_u='$id_usu'";
           $resultusu = $mysqli->query($sqlusu);
           $rowusu = $resultusu->fetch_array(MYSQLI_NUM);
           $puntos = $rowusu[6];
        if($puntos>=4){
           $sql1 = "SELECT * from n_celular where id_u='$id_usu'";
           $result1 = $mysqli->query($sql1);
           while($row1 = $result1->fetch_array(MYSQLI_NUM))
           {
              $celular  = $row1[2];
              if($celular == $numero){
                $sql11 = "SELECT * from n_celular where numero='$celular'";
                $result11 = $mysqli->query($sql11);
                $row11 = $result11->fetch_array(MYSQLI_NUM);
                $saldo = $row11[4] + 100;
                $sql2 = "UPDATE n_celular set saldo='$saldo' where numero='$celular'";
                $result2 = $mysqli->query($sql2);
                $sqlusu = "SELECT * from usuario where id_u='$id_usu'";
                $resultusu = $mysqli->query($sqlusu);
                $rowusu = $resultusu->fetch_array(MYSQLI_NUM);
                $puntos = $rowusu[6] - 4;
                $sql111 = "UPDATE usuario set puntos='$puntos' where id_u='$id_usu'";
                $result111 = $mysqli->query($sql111);
                $bandera=1;
                header('Location: recompensas.php');
              }
           }
           if($bandera == 0){
           $sql = "INSERT INTO n_celular(id_u, numero, operador,saldo)
           VALUES ('$id_usu','$numero','$operador',100)";
           $result1 = $mysqli->query($sql);

           $puntos = $puntos - 4;

           $sql1 = "UPDATE usuario set puntos='$puntos' where id_u='$id_usu'";
           $result1 = $mysqli->query($sql1);

           header('Location: recompensas.php');
          }
        }
        else{
          ?>
          <br><br><center>
          <h1 id="puntaje">Su cantidad de puntos actual es: <?php echo $puntos; ?></h1>
          <br><br>
          <h3 style="color:white">No se puede permitir que reclames esta recompensa</h3><br>
          <h3 style="color:white">No posees los puntos necesarios, sigue reciclando</h3>
          <br><br>
          <a href="recompensas.php"><button style='width:200px; height:70px'>Regresar al menú</button></a>

          </center>
          <?php
        }
       }
       else{
        $id_usu= $_SESSION["id_u"];
        $mysqli = new mysqli("localhost","root","","eml");
        $sqlusu = "SELECT * from usuario where id_u='$id_usu'";
        $resultusu = $mysqli->query($sqlusu);
        $rowusu = $resultusu->fetch_array(MYSQLI_NUM);
        $puntos = $rowusu[6];
        ?>
        <br><br><center>
        <h1 id="puntaje">Su cantidad de puntos actual es: <?php echo $puntos; ?></h1>
        <h3 style="color:white">Se descontaran 4 puntos</h3>
        </center>
        <?php
        if (isset($_GET["recompensa"]))
        {
            $recompensa = $_GET["recompensa"];
            if ($recompensa==1){
              $sqlusu = "SELECT * from usuario where id_u='$id_usu'";
              $resultusu = $mysqli->query($sqlusu);
              $rowusu = $resultusu->fetch_array(MYSQLI_NUM);
              $puntos = $rowusu[6];
              if($puntos>=4){
              $sqlusu = "SELECT * from usuario where id_u='$id_usu'";
              $resultusu = $mysqli->query($sqlusu);
              $rowusu = $resultusu->fetch_array(MYSQLI_NUM);
              $puntos = $rowusu[6] - 4;

              $sql1 = "UPDATE usuario set puntos='$puntos' where id_u='$id_usu'";
              $result1 = $mysqli->query($sql1);
              /* AQUI DEBE ENVIARSE LA SENAL AL DISPENSADOR */
              header('Location: recompensas.php');
              }
              else{
        ?>
          <br><br><center>
          <h1 id="puntaje">Su cantidad de puntos actual es: <?php echo $puntos; ?></h1>
          <br><br>
          <h3 style="color:white">No se puede permitir que reclames esta recompensa</h3><br>
          <h3 style="color:white">No posees los puntos necesarios, sigue reciclando</h3>
          <br><br>
          <a href="recompensas.php"><button style='width:200px; height:70px'>Regresar al menú</button></a>
          </center>
       <?php 
              }
            }
          }
        ?>
        <?php
        if (isset($_GET["recompensa"]))
        {
            $recompensa = $_GET["recompensa"];
            if ($recompensa==2){
                header('Location: cerrar_sesion.php');
        ?>
       <!-- ESPACIO DISPONIBLE PARA MOSTRAR ALGO EN CASO DE QUE
       PUNTOS REALICE ALGUNA FUNCION -->
       <?php 
            }
          }
        ?>
<?php
if (isset($_GET["recompensa"]))
{
    $recompensa = $_GET["recompensa"];
    if ($recompensa==3){
    
        ?>
       <br><br>
       <center>
       <h1 style="color:white">Recarga tu celular</h1>
       <form method=POST action="reclamar.php">
       <br>
       <h3 style="color:white">Operador: </h3>
        <select name="operador">
        <option value="Claro" selected>Claro</option>
        <option value="Tigo">Tigo</option>
        <option value="Movistar">Movistar</option>
        <option value="Otro">Otro</option>
        </select>
        <br><br>
        <h3 style="color:white">Numero: </h3>
        <input type="text" name="numero" placeholder="Ej:3128211660" required pattern="[0-9]{10}" value=""/>
        <table width=50% align=center border=0>
        <tr> 
        <br><br>    
	    <input type="hidden" value="S" name="enviado">
        <input type=submit value="Canjear" name="Modificar" class="boton1 btn btn-secondary"> 
        __
        <input type="reset" value="Limpiar" class="boton1 btn btn-secondary"/>
        </form>
       </center>
<?php 
        }
    }
}
?>
</body>