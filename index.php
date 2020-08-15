<?php session_start();
      session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Singapur</title>     
    <link rel="stylesheet"  href="assets/css/acceso.css">  
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

<script>
   
  function Acceder(){
     $user=$("#username").val()
	 $pass=$("#password").val()
	 if($user==''){swal("Ingrese Usuario ..", "Verifique sus Datos", "error");$("#username").focus(); exit;}
	 if($pass==''){swal("Ingrese Contraseña ..", "Verifique sus Datos", "error");$("#password").focus(); exit;}
	 $.post("controlador/Cusuario.php",{accion:'ACCEDER',user:$user,pass:$pass},function(data){
		 //alert(data)
		// $data=data.split('***')
		if(data==0){swal("Usuario o Contraseña Incorrecta", "Verifique sus Datos", "error");return false;}
		else{location.href='Panel.php';
			/*if($data[1]=='ADMIN'){location.href='Adm_Panel.php';}
			if($data[1]=='SIST'){location.href='Adm_Panel.php';}
			if($data[1]=='CAJA'){location.href='Adm_Cajero.php';}*/
		  }
	 })
   }
 $(document).ready(function() {  
  $("#username").focus()
  $("#password" ).keypress(function( event ) {
    if ( event.which == 13 ) {
       Acceder()
      }
   });
 })
</script>
  </head>
  <body>
    <div class="login-box" >
      <!--<img src="imagenes/logo2.jpg" class="avatar">--><br>
     <img src="imagenes/logo.jpg" style="width:100%; text-align:center"><br>
      <table width="100%" border="0">
        <tr><td>&nbsp;</td></tr>
        <tr>
          <td>	          
             <b style="font-size:14px">USUARIO</b>
             <input type="text" id="username" style="width:83%; padding-left:35px" autocomplete="off">
          </td>
        </tr> 
        <tr><td>&nbsp;</td></tr>
        <tr>
          <td>
             <b style="font-size:14px !important">CONTRASE&Ntilde;A</b>
             <input type="password" id="password" style="width:83%;padding-left:35px">
          </td>
        </tr> 
         <tr><td>&nbsp;</td></tr>
        <tr><td align="center"><input type="button" value="Iniciar Sesión" onClick="javacript:Acceder();"  size="90%"></td></tr>
      </table>
      <!--<form>
        
        <label for="usuario">USUARIO</label>
        <input type="text"  required id="username">
        
        <label for="contrasena">PASSWORDD</label>
        <input type="password"  required id="password">
        <input type="button" value="Iniciar Sesión" onClick="javacript:Acceder();">
        
      </form>-->
    </div>
  </body>
</html>