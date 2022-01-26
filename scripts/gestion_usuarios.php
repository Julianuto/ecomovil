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
           <title>Gestion de usuarios</title>
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
			        <font FACE="Century Gothic" SIZE=2 color="white" > <b><h1>Gestión de usuarios</h1></b></font>
		          </td>
        </tr>
		    </table>
      <tr>
             <td align=center>
        <form action="gestion_usuarios.php" method="POST" align=center>
          <tr>
           <td align=center >
             <font FACE="Century Gothic" SIZE=4 color="white">Identificación: <input type="number" name=id_con placeholder="Número de ID" value=""></font>  &nbsp&nbsp&nbsp

             <font FACE="Century Gothic" SIZE=4 color="white">Nombre: <input type="text" name=nombre_con placeholder="Nombre usuario" value=""></font>            &nbsp&nbsp&nbsp
           </td>
          </tr>



          <tr>
           
           <td align=center width=50%>
             <font FACE="Century Gothic" SIZE=2 color="#000000"><input type="submit" name=Consultar style='width:100px; height:35px' value="Consultar"></font>      <br>
           </td>
          </tr> </td>   <br>

          <input type="hidden" value="1" name="enviado">
         </form>
        </td>
      </tr>                       
	  	     <tr>
                  <td colspan=2 height="20%" align="left" 				
                    bgcolor="#FFFFFF" class="_espacio_celdas" 					
                    style="color: #FFFFFF; 
			             font-weight: bold">

     <table width=80% border=0 align=center>
			 <tr>	
				<td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Nombre</b></font>
				</td>	
				<td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Apellido</b></font>
				</td> 	
				<td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>ID</b></font>
				</td>
				<td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Tipo de usuario</b></font>
				</td>
        <td bgcolor="#4DEB10" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Puntos</b></font>
				</td>
			</tr>
				  
<?php
         $mysqli = new mysqli("localhost","root","","eml");
		     if ((isset($_POST["enviado"])))
         {
           $id_con = $_POST["id_con"];
           $nombre_con = $_POST["nombre_con"];
           $sql1 = "SELECT * from usuario order by nombre";
           if (($id_con == "") && ($nombre_con == ""))
             {
                $sql1 = "SELECT * from usuario order by nombre";
             }
           if (($id_con != "") && ($nombre_con == ""))
             {
                $sql1 = "SELECT * from usuario where cedula LIKE '%$id_con%'";
             }
           if (($id_con == "") && ($nombre_con != ""))
             {
                $sql1 = "SELECT * from usuario where nombre LIKE '%$nombre_con%' order by nombre";
              }
           if (($id_con != "") && ($nombre_con != ""))
             {
              
                 $sql1 = "SELECT * from usuario where nombre LIKE '%$nombre_con%' and cedula LIKE '%$id_con%'";
             }      
          }
         else
             $sql1 = "SELECT * from usuario order by nombre";

         //echo "sql1 es...".$sql1;
         
         $result1 = $mysqli->query($sql1);
         while($row1 = $result1->fetch_array(MYSQLI_NUM))
         {
			    $id_usu  = $row1[0];
			    $id_usu_enc = md5($id_usu);
			    $nombre_usuario  = $row1[2];
          $apellido_usuario  = $row1[3];
	     	  $num_id = $row1[4];
          $tipo_usuario  = $row1[1];
          $puntos = $row1[6];

     	    $sql3 = "SELECT * from tipo_u where id_tipou='$tipo_usuario'";
            $result3 = $mysqli->query($sql3);
            $row3 = $result3->fetch_array(MYSQLI_NUM);
            $desc_tipo_usuario = $row3[1];

?>
		
		        <tr>	
				<td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b> <?php echo $nombre_usuario; ?></b></font>
				</td>	
				<td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b><?php echo $apellido_usuario; ?></b></font>
				</td>
				<td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b><?php echo $num_id; ?></b></font>
				</td>	
				<td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b><?php echo $desc_tipo_usuario; ?></b></font>
				</td>
        <td bgcolor="#EEEEEE" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b><?php echo $puntos; ?></b></font>
				</td>
        
				

	     </tr>

	     	         
<?php
			   }
?>

        </table>
        <br><br>
</body>
</html>