<?php session_start(); 
    require_once('../cado/ClaseSerie.php'); 
	
   controlador($_POST['accion']);
   
    function controlador($accion){
	
	   $oprincipio=new Series();
	  
	   if($accion=='LISTAR'){
		   $tbl='';$i=0;
		   $buscar=$_POST['buscar'];
		    $listar=$oprincipio->Listar($buscar);
			 while ($fila=$listar->fetch()){$i++;
			  $id='IdtblUsuario_'.$i;
			  $principio=$fila[2];
			  if($i%2==0){$color="style='height:25px; background-color:#f5f5f5'";}
			   else{$color="style='height:25px; background-color:#FFFFFF; '";}
				 $tbl.="<tr $color id='$id' onclick=\"javascript:PintarFila('$id')\" IdPrin='$fila[0]' nom='$fila[2]' tipo='$fila[1]'  >
				            <td align='center' width='5%' style='font-size:11px'>&nbsp;&nbsp;$i</td>
							<td align='center' width='10%' style='font-size:11px'>&nbsp;&nbsp;$fila[1]</td>
							<td width='85%' style='font-size:11px'>&nbsp;&nbsp;$principio</td>
				        </tr>";
				}
			echo $tbl; 
		 }
		if($accion=='LIS_LIBRE'){
		   $tbl='';$i=0;
		    $listar=$oprincipio->ListarDesocupado();
			
			 while ($fila=$listar->fetch()){$i++;
			 
			  $id='IdtblLi_'.$i;
			  $principio=$fila[2];
			  if($i%2==0){$color="style='height:25px; background-color:#f5f5f5'";}
			   else{$color="style='height:25px; background-color:#FFFFFF; '";}
				 $tbl.="<tr $color id='$id'  IdPrin='$fila[0]' nom='$fila[2]' tipo='$fila[1]'  >
				            <td align='center' width='15%' style='font-size:11px'>&nbsp;&nbsp;$fila[1]</td>
							<td align='center' width='70%' style='font-size:11px'>&nbsp;&nbsp;$fila[2]</td>
							<td width='15%' align='center'>
							  <input type='checkbox' onclick=\"javascript:PintarFila1('$id')\" idtr='$id' value='$fila[0]'  >
							</td>
				        </tr>";
				}
			echo $tbl; 
		 }
		 
	if($accion=='NUEVO'){
			$id=$_POST['id'];
			$familia=utf8_decode($_POST['familia']);
			$valor=$_POST['valor'];
			$tipo=$_POST['tipo'];
			$val=$oprincipio->ValSer($familia,$tipo);
			while($fi=$val->fetch()){
				$error=$fi[0];
			}
			if($error>0){echo 2;exit;}
			if ($valor==1){
			    // si el valor es igual a 1 insertamos
				     $insertar=$oprincipio->Registrar($familia,$tipo);
			         if ($insertar->rowCount()==0){echo 0;}else{echo 1;}; exit;    
			}
			if ($valor==2){
				// si el valor es igual a 2 modificamos
			         $modificar=$oprincipio->Modificar($id,$familia,$tipo);
			         if ($modificar->rowCount()==0){echo 0;}else{echo 1;}    				
			}
			
		} 
	 if($accion=="LLENAR"){
		$tbl="";
		$id=$_POST['id'];
		$tbl="<option value='0'>.: Seleccione :.</option>";
		$listar=$oprincipio->Listar("");
		while($fila=$listar->fetch()){
		   $nom=$fila[1];
		   if($id==$fila[0]){$selec="selected='selected'";}else{$selec="";}
		   $tbl.="<option value='$fila[0]' $selec >$nom</option>";  
		 }
		 echo $tbl;
	  }
	  if($accion=="CORRE"){
		$tbl="";
		$user=$_SESSION['S_user'];
		$tipo_doc=$_POST['tipo_doc'];
		$listar=$oprincipio->GenerarDoc($user,$tipo_doc);
		while($fila=$listar->fetch()){ $ser =$fila[0];$correlativo =$fila[1];}
		echo $ser.'///'.$correlativo;   
	  }
	}
?>