<?php  session_start();
    require_once('../cado/ClaseUsuario.php'); 
	
	

   controlador($_POST['accion']);
   
    function controlador($accion){
	
	   $ousuario=new Usuarios();
	  
	   if($accion=='LISTAR'){
		   if(!isset($_SESSION['S_user'])) {header("location:../index.php");exit;}
		   $tbl='';$i=0;
		   $buscar=$_POST['buscar'];
		    $listar=$ousuario->Listar($buscar);
			$cant=$listar->rowCount();
			if($cant>11){$tam="width='9.5%'";}else{$tam="width='10%'";}
			 while ($fila=$listar->fetch()){$i++;
			  $id='IdtblUsuario_'.$i;
			  if($fila[4]==0){$check="checked='checked'";}else{$check='';}  
			  if($i%2==0){$color="style=' background-color:#f5f5f5; height:15px;'";}
			   else{$color="style='background-color:#FFFFFF; height:15px;'";}
				 $tbl.="<tr $color id='$id' onclick=\"javascript:PintarFila('$id')\" idusu=$fila[0] nombre='$fila[1]' login='$fila[2]'  pass='$fila[3]' estado='$fila[4]' 
				 idgrupo='$fila[5]' tipo='$fila[5]' >
				            <td class='center' width='10%' style='font-size:11px' >$i</td>
							<td width='40%' style='font-size:11px'>&nbsp;&nbsp;$fila[1]</td>
							<td  width='9.8%' style='font-size:11px'>&nbsp;&nbsp;$fila[2]</td>
							<td class='center' width='15%' style='font-size:11px'>&nbsp;&nbsp;$fila[3]</td>
							<td class='center' $tam ><input type='checkbox' $check disabled='disabled'  /></td>
				        </tr>";
				}
			echo $tbl; 
		 }
	
	if($accion=='LIS_GRUPO'){
		   $tbl='';$i=0;
		   $buscar=$_POST['buscar'];
		    $listar=$ousuario->ListarGrupo($buscar);
			$cant=$listar->rowCount();
			if($cant>11){$tam="width='9.5%'";}else{$tam="width='10%'";}
			 while ($fila=$listar->fetch()){$i++;
			  $id='IdtblUsuario_'.$i; 
			  if($fila[2]==0){$tip='SISTEMA INTRANET';}else{$tip='PAGINA WEB';}
			  if($i%2==0){$color="style=' background-color:#f5f5f5; height:15px;'";}
			   else{$color="style='background-color:#FFFFFF; height:15px;'";}
				 $tbl.="<tr $color id='$id' onclick=\"javascript:PintarFila('$id')\" idusu='$fila[0]' nombre='$fila[1]' tip='$fila[2]' >
				            <td class='center' width='10%' style='font-size:11px' >$i</td>
							<td width='40%' style='font-size:11px'>&nbsp;&nbsp;$fila[1]</td>
							<td $tam style='font-size:11px'>&nbsp;&nbsp;$tip</td>
				        </tr>";
				}
			echo $tbl; 
		 }
	
	if($accion=='NUEVO'){
			$id=$_POST['id'];
			$usuario=utf8_decode($_POST['usuario']);
			$login=$_POST['login'];
			$estado=$_POST['estado'];
			$valor=$_POST['valor'];
			$tipo=$_POST['tipo'];
			$validar=$ousuario->ValidarUsuario($login);
			while($fila=$validar->fetch()){$can=$fila[0];}
			if ($valor==1){
				$pass=md5($_POST['pass']);
				if($can==0){
			    // si el valor es igual a 1 insertamos
				     $insertar=$ousuario->Registrar($usuario,$login,$pass,$estado,$tipo);
			         if ($insertar->rowCount()==0){echo 0;}else{echo 1;}; exit;    
			    }else echo 2;exit;
			}
			if ($valor==2){
				   if(strlen($_POST['pass'])==32){$pass=$_POST['pass'];}else{$pass=md5($_POST['pass']);}
				// si el valor es igual a 2 modificamos
			         $modificar=$ousuario->Modificar($id,$usuario,$login,$pass,$estado,$tipo);
			         if ($modificar->rowCount()==0){echo 0;}else{echo 1;}    				
			}
			
		} 
		
	if($accion=='NUEVO_GRUPO'){
			$id=$_POST['id'];
			$nombre=utf8_decode($_POST['nombre']);
			$tip=$_POST['tip'];
			$valor=$_POST['valor'];
			$validar=$ousuario->ValidarGrupo($nombre);
			while($fila=$validar->fetch()){$can=$fila[0];}
			if ($valor==1){
				if($can==0){
			    // si el valor es igual a 1 insertamos
				     $insertar=$ousuario->RegistrarGrupo($nombre,$tip);
			         if ($insertar->rowCount()==0){echo 0;}else{echo 1;}; exit;    
			    }else echo 2;exit;
			}
			if ($valor==2){
				 
			         $modificar=$ousuario->ModificarGrupo($id,$nombre,$tip);
			         if ($modificar->rowCount()==0){echo 0;}else{echo 1;}    				
			}
			
		}
				
	    if($accion=='LIST'){
			$id_area_f = $_POST['id_area'];
			$list = $oarea->AreaXId($id_area_f);
			$fila = $list->fetch();
			
			echo $fila[0].'***'.$fila[1].'***'.$fila[2];	
		} 
		if($accion=='ELIMINAR'){
			$id=$_POST['id'];
			$eliminar = $ousuario->Eliminar($id);		
		}
		
		if($accion=='ID'){
			$list = $oarea->Obtener_Id();
			$fila = $list->fetch();
			echo $fila[0];
				
		}	
		
		if($accion=='ACCEDER'){	
	      $user=md5($_POST['user']);
		  $pass=md5($_POST['pass']);
		  $listar=$ousuario->Acceso($user,$pass);$i=0;
		  while($fila=$listar->fetch()){$i++;
		  $_SESSION['S_user']=$fila[2];
		  $tipo_user=$fila[5];
		  $_SESSION['S_iduser']=$fila[0];
		  
		  } 
		  
		  echo $i;
		}
		
		if($accion=='AC_EMP'){	
	      $user=md5($_POST['user']);
		  $pass=md5($_POST['pass']);
		  $listar=$ousuario->AccesoEmpresa($user,$pass);$i=0;
		  while($fila=$listar->fetch()){$i++;$_SESSION['S_user']=$fila[0];$_SESSION['S_ruc']=$fila[1];}
		  echo $i;
		}
		
		if($accion=='AC_PAC'){	
	      $user=md5($_POST['user']);
		  $pass=md5($_POST['pass']);
		  $listar=$ousuario->AccesoPaciente($user,$pass);$i=0;
		  while($fila=$listar->fetch()){$i++;$_SESSION['S_user']=$fila[0];$_SESSION['S_dni']=$fila[1];}
		  echo $i;
		}
		
		if($accion=="LLENAR_GRUPO"){
		$tbl="";
		$id=$_POST['id'];
		$tbl="<option value='0'>.: Seleccione :.</option>";
		$listar=$ousuario->ListarGrupo("");
		while($fila=$listar->fetch()){
		   if($id==$fila[0]){$selec="selected='selected'";}else{$selec="";}
		    $grupo=utf8_decode($fila[1]);
		    $tbl.="<option value='$fila[0]' $selec >$grupo</option>";  
		 }
		echo $tbl;
	    }
		
		if($accion=='CAMBIAR_CLAVE'){	
	      $ruc=$_SESSION['S_ruc'];
		  $pass=md5($_POST['clave']);
		  $update=$ousuario->CambiarClave($ruc,$pass);
		  if($update->rowCount()==0){echo 0;}else{echo 1;}
		  echo $i;
		 }
		 
		if($accion=='CAMBIAR_CLAVEPAC'){	
	      $dni=$_SESSION['S_dni'];
		  $pass=md5($_POST['clave']);
		  $update=$ousuario->CambiarClavePac($dni,$pass);
		  if($update->rowCount()==0){echo 0;}else{echo 1;}
		  echo $i;
		 }
		 
		if($accion=='VAL_CLAVE'){
		  $ruc=$_SESSION['S_ruc'];	
	      $clave=md5($_POST['clave']);
		  $validar=$ousuario->ValidarClave($ruc,$clave);
		  $data=$validar->fetch();
		  $can=$data[0];
		  echo $can;
		 }
		 if($accion=='VAL_CLAVEPAC'){
		  $dni=$_SESSION['S_dni'];	
	      $clave=md5($_POST['clave']);
		  $validar=$ousuario->ValidarClavePac($dni,$clave);
		  $data=$validar->fetch();
		  $can=$data[0];
		  echo $can;
		 }		 
		
	}
?>