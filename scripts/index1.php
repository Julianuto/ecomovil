<?php
include "conectar.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 	Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
     <html>
       <head>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           <title> EML</title>
           <style>
        .boton {
        background:white;
        color:#000000;
        text-align:center;
        position:absolute;
        left: 47%;
        top: 70%;
       }
       .boton1 {
        background:white;
        color:#000000;
        text-align:center;
       }
       .boton2 {
        background:white;
        color:#000000;
        text-align:center;
        position:absolute;
        left: 47%;
        top: 77%;
       }
</style>
        </head>
       <body background="../img/1.png">
       <a href="#ventana1" class="boton btn btn-secondary" data-toggle="modal">Iniciar Sesion</a>
       <a href="#ventana2" class="boton2 btn btn-secondary" data-toggle="modal">Registrarse</a>  
       <div class="modal fade" id="ventana1" data-keyboard="false" data-backdrop="static">
        <form method="POST" action="validar.php">
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title">Inicio de sesion</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          </div>
          <div class="modal-body">
        <p>  
            <table width="100%" align=center border=0 bgcolor="#FFFFFF" valign=center>
         <tr>
           <td width="25%" height="20%" align="right"
             bgcolor="#FFFFFF" class="_espacio_celdas"
             style="color: #000000; 
            font-weight: bold; font-family:Century Gothic"">
             Número de Cédula:
           </td>
           <td width="25%" height="20%" align="center" 				
             bgcolor="#FFFFFF" class="_espacio_celdas"
             style="color: #000000;  
            font-weight: bold;
            padding:0%">
              <input type=text value="" name="login1" required >
           </td>
         </tr>  
         <tr>
           <td width="25%" height="20%" align="right"
           bgcolor="#FFFFFF" class="_espacio_celdas"
             style="color: #000000; 
            font-weight: bold; font-family:Century Gothic" >
             Contraseña:
           </td>
           <td width="25%" height="20%" align="center"
           bgcolor="#FFFFFF" class="_espacio_celdas"
             style="color: #000000; 
            font-weight: bold">
              <input type=password value="" name="passwd1" required> 
           </td>
         </tr>  
         <?php
         if (isset($_GET["mensaje"]))
          {
          $mensaje = $_GET["mensaje"];
             if ($_GET["mensaje"]!=""){
         ?>
         <tr>
           <td width="25%" height="20%" align="center" 				
             bgcolor="#FFCCCC" class="_espacio_celdas_p" 					
             style="color: #FF0000; 
            font-weight: bold">
             Datos Incorrectos:
           </td>
           <td width="25%" height="20%" align="left" 				
             bgcolor="#FFDDDD" class="_espacio_celdas_p" 					
             style="color: #FF0000; 
            font-weight: bold">
             <?php 
                if ($mensaje == 1)
                  echo "El password del usuario no coincide.";
                if ($mensaje == 2)
                  echo "No hay usuarios con el login (usuario) ingresado o esta inactivo.";
                if ($mensaje == 3)
                  echo "No se ha logueado en el Sistema. Por favor ingrese los datos.";
                if ($mensaje == 4)
                  echo "Su tipo de usuario, no tiene las credenciales suficientes para ingresar a esta opcion.";
             ?>                         
           </td>
         </tr>  
         <?php 
            }
          }
         ?>
         </table>
         </p>
      </div>

      <div class="modal-footer">
        <button type="button" class="boton1 btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type=submit value="Entrar" name="Enviar" class="boton1 btn btn-primary">
      </div>
          </div>
          </div>
    </form>
       </div>

       <div class="modal fade" id="ventana2" data-keyboard="false" data-backdrop="static">
       <form method=POST action="index1.php">
       <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title">Registrarse</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          </div>
          <div class="modal-body">
          <?php
      if (isset($_GET["mensaje"]))
      {
        $mensaje = $_GET["mensaje"];
        if ($_GET["mensaje"]!=""){?>

             <td height="100%" align="center">
                  <table width=100% border=0>
                   <tr>
                    <?php
                       if ($mensaje == 1)
                         echo " <td bgcolor=#DDFFDD class=_espacio_celdas_p
                    style=color: #000000; font-weight: bold font-family=century gothic >Usuario actualizado correctamente.";
                       if ($mensaje == 2)
                         echo "<td bgcolor=#FFDDDD class=_espacio_celdas_p
                    style=color: #000000; font-weight: bold >Usuario no fue actualizado correctamente.";
                       if ($mensaje == 3)
                         echo "<td bgcolor=#DDFFDD class=_espacio_celdas_p
                    style=color: #000000; font-weight: bold >Usuario creado correctamente.";
                       if ($mensaje == 4)
                         echo "<td bgcolor=#FFDDDD class=_espacio_celdas_p
                    style=color: #000000; font-weight: bold >Usuario no fue creado. Se presento un inconveniente";
                       if ($mensaje == 5)
                         echo "<td bgcolor=#FFDDDD class=_espacio_celdas_p
                    style=color: #000000; font-weight: bold >Usuario no fue creado. Ya existe usuario con la misma cedula.";

             echo "</td></tr>
                  </table>
              </td>
    		     </tr>";

            }
           }
            ?>

<?php

if ((isset($_POST["enviado"])))
  {
   //echo "grabar cambios modificaci�n";
   $nombre_usuario = $_POST["nombre"];
   $nombre_usuario = str_replace("�","n",$nombre_usuario);
   $nombre_usuario = str_replace("�","N",$nombre_usuario);
   $apellido_usuario = $_POST["apellido"];
   $apellido_usuario = str_replace("�","n",$apellido_usuario);
   $apellido_usuario = str_replace("�","N",$apellido_usuario);
   $num_id = $_POST["num_id"];
   $contraseña = $_POST["password"]; 
   $mysqli = new mysqli("localhost","root","","eml");
   $sqlcon = "SELECT * from usuario where cedula ='$num_id'";
   echo $sqlcon;
   $resultcon = $mysqli->query($sqlcon);
   $rowcon = $resultcon->fetch_array(MYSQLI_NUM);
   $numero_filas = $resultcon->num_rows;


   if ($numero_filas > 0)
     {
         header('Location: index1.php?mensaje=5');
     }
   else
    {
      $sql = "INSERT INTO usuario(ID_TIPOU, nombre, apellido, CEDULA, contrasena)
      VALUES (2,'$nombre_usuario','$apellido_usuario','$num_id','$contraseña')";
      //echo "sql es...".$sql;
      $result1 = $mysqli->query($sql);

      if ($result1 == 1)
        {
          header('Location: index1.php?mensaje=3');
        }
      else
         header('Location: index1.php?mensaje=4');

    }
}

else

{

   ?>
            <tr>
                  <td colspan=2 width="25%" height="20%" align="left"
                    bgcolor="transparent" class="_espacio_celdas"
                    style="color: #FFFFFF;
			             font-weight: bold">

                   
                   <table width=50% border=0 align=center>

				<td bgcolor="transparent" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Nombre</b></font>
				</td>
				<td bgcolor="transparent" align=center padding:0%>
				  <input type="text" name=nombre value="" required>
				</td>
       </tr>
         <tr>
				<td bgcolor="transparent" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Apellido</b></font>
				</td>
				<td bgcolor="transparent" align=center>
				  <input type="text" name=apellido value="" required>
				</td>
			     </tr>
	     <tr>
				<td bgcolor="transparent" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Numero de cedula</b></font>
				</td>
				<td bgcolor="transparent" align=center>
				  <input type="number" name=num_id value="" style="text-decoration: none" required>
				</td>
			     </tr>

	     <tr>
				<td bgcolor="transparent" align=center>
				  <font FACE="Century Gothic" SIZE=2 color="#000000"> <b>Contraseña</b></font>
				</td>
				<td bgcolor="transparent" align=center>
				  <input type="password" name=password value="" required>
				</td>
	     </tr>
	       <input type="hidden" value="S" name="enviado">
         <table width=50% align=center border=0>
           <tr>
             <td width=50%></td>
             <td align=center>
             </td>
           </tr>
      </table>
<?php
 }
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="boton1 btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type=submit value="Registrar" name="Modificar" class="boton1 btn btn-primary">
        </form>
      </div>
        </div>    
        </div>       
        </div>
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       </form>
       </body>