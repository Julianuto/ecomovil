<?php

// PROGRAMA DE MENU ADMINISTRADOR
include "conectar.php";
                                                 
session_start();
if ($_SESSION["autenticado"] != "SIx3")
    {
      header('Location: index1.php?mensaje=3');
    }
else
    {      
        $mysqli = new mysqli("localhost","root","","eml");
       $sqlusu = "SELECT * from tipo_u where id_tipou='1'"; //CONSULTA EL TIPO DE USUARIO CON ID=1, ADMINISTRADOR
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
           <title>Informe de recompensas</title>
        </head>
       <body background="../img/3.png">
        <table width="100%"  align=center cellpadding=5 border=0 bgcolor="transparent">
    	   <tr>
           <td valign="top" align=left width=70% >
              <table width="100%" align=center border=0>
            	   <tr>
                  <td valign="top" align=center width=30% >
                     <img src="../img/logo.png" border=0 width=90 height=90>

             	    </td>
                  <td valign="bottom" align=center width=40%>
                     <h1><font color=#FFFFFF face="Century Gothic">Ecología Móvil</font></h1>
             	    </td>
           	    </tr>
         	    </table>
           </td>
           <td valign="top" align=right >
              <font FACE="Century Gothic" SIZE=3 color="#FFFFFF"> <b><?php  echo "Usuario</u>:   ".$_SESSION["nombre"]; echo "     ";?> </b></font><br>
              <font FACE="Century Gothic" SIZE=3 color="#FFFFFF"> <b><?php  echo "Tipo</u>:   ".$desc_tipo_usuario;?> </b></font><br><br>
              <font FACE="Century Gothic" SIZE=3 color="#FFFFFF"> <b><a href="cerrar_sesion.php"><button style='width:100px; height:35px'>Cerrar sesión</button></a></b></font>

           </td>
	     </tr>
     </table>
    <table width="100%" align=center cellpadding=5 border=0 bgcolor="transparent">
<?php
include "menu_admin.php";
?>
        <tr valign="top">
              <td height="20%" align="center" bgcolor="transparent" class="_espacio_celdas"
              style="color: #FFFFFF; font-weight: bold ">
			        <font FACE="Century Gothic" SIZE=2 color="white" > <b><h1>Informe de recompensas</h1></b></font>
		          </td>
        </tr>
	</table>
      <tr>
      </tr>
	  	     <tr>
                  <td colspan=2 height="20%" align="left" bgcolor="#FFFFFF" class="_espacio_celdas" 					
                    style="color: #FFFFFF; font-weight: bold">

     <table width=80% border=0 align=center>
			 <tr>
                <td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Id Usuario</b></font>
				</td>	
				<td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Nombre</b></font>
				</td>	
				<td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Número</b></font>
				</td> 	
				<td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Operador</b></font>
				</td>
				<td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Saldo</b></font>
				</td>
			</tr>
				  
<?php
        $mysqli = new mysqli("localhost","root","","eml");
        $sql1 = "SELECT * from n_celular order by id_nc";
        $result1 = $mysqli->query($sql1);
        while($row1 = $result1->fetch_array(MYSQLI_NUM))
        {
        $id_usu  = $row1[1];
        $sql11 = "SELECT * from usuario where id_u='$id_usu'";
        $result11 = $mysqli->query($sql11);
        $row11 = $result11->fetch_array(MYSQLI_NUM);
        $nombre = $row11[2];
        $apellido = $row11[3];
		$numero = $row1[2];
		$operador  = $row1[3];
        $saldo  = $row1[4];
?>
		
		        <tr>
                <td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b> <?php echo $id_usu;?></b></font>
				</td>	
				<td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b> <?php echo $nombre;echo " ";echo $apellido; ?></b></font>
				</td>	
				<td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b><?php echo $numero; ?></b></font>
				</td>
				<td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b><?php echo $operador; ?></b></font>
				</td>	
				<td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b><?php echo $saldo; ?></b></font>
				</td>
	     </tr>      
<?php
	}
?>
        </table>
        <br><br>
</body>
</html>