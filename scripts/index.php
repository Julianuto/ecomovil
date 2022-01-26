<html>
    <head>
      <title> Ecomovil
		  </title>
      <meta http-equiv="refresh" content="15" />
    </head>
    <body>
    <table width="80%" align=center cellpadding=5 border=0 bgcolor="#FFFFFF">

<tr>
  
  <td valign="top" align=center bgcolor="#0000">
   &nbsp &nbsp
    <h2> <font color=white face="Century Gothic">Ingreso de Usuarios </font></h2>
     <form method="POST" action="validar.php">
       <table width="100%" align=center border=0 bgcolor="#0000" valign=center>
         <tr>
           <td width="25%" height="20%" align="right"
             bgcolor="#0000" class="_espacio_celdas"
             style="color: #FFFFFF; 
            font-weight: bold; font-family:Century Gothic"">
             Número de Cédula:
           </td>
           <td width="25%" height="20%" align="center" 				
             bgcolor="#000000" class="_espacio_celdas"
             style="color: #FFFFFF; 
            font-weight: bold;
            padding:0%">
              <input type=text value="" name="login1" required >
           </td>
         </tr>  
         <tr>
           <td width="25%" height="20%" align="right"
             bgcolor="#000000" class="_espacio_celdas"
             style="color: #FFFFFF; 
            font-weight: bold; font-family:Century Gothic" >
             Contraseña:
           </td>
           <td width="25%" height="20%" align="center"
             bgcolor="#000000" class="_espacio_celdas"
             style="color: #FFFFFF; 
            font-weight: bold">
              <input type=password value="" name="passwd1" required> 
           </td>
         </tr>  
         <tr>
           <td width="25%" height="20%" align="center" 				
             bgcolor="#000000" class="_espacio_celdas"
             style="color: #FFFFFF; 
            font-weight: bold">
             &nbsp;&nbsp;
           </td>

           <td width="25%" height="20%" align="center"
             bgcolor="#000000" class="_espacio_celdas"
             style="color: #FFFFFF;
            font-weight: bold; font-family:Century Gothic"" >
            <input type=submit value="Entrar" name="Enviar">
            <a href="registro.php"><input type="button" value="Registrate" >
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
      </form> 
  </td>
 </tr>  </table><table width="80%" align=center cellpadding=5 border=0 bgcolor="#FFFFFF">
 <tr>
  <td valign="top" align=center width=80& colspan=2 bgcolor="#0000">
    <h1> <font color="#aaff01" face="Century Gothic">Ecología Móvil</font></h1>
  </td>
</tr> </table>       <table width="80%" align=center cellpadding=5 border=0 bgcolor="#FFFFFF">
 <tr>
  <td valign="center" align=center width=30 colspan=1 bgcolor="#000000">
    <img src="../img/ecomovil.png" border=0 width=600 height=350>
  </td>
  
 </tr>

</table>
     </body>
   </html>