<?php  
    require_once('../cado/ClaseGrupo.php'); 
	date_default_timezone_set('America/Lima');
	session_start();
	

   controlador($_POST['accion']);
   
    function controlador($accion){
	
	   $ogrupo=new Grupos();
	  
	   
		
		 if($accion=='LISTAR_CONV'){
		   $grupo=$_SESSION['S_grupo_nombre'];
		   if($grupo!='VENTAS'){$img="<img src='imagenes/delete.png' width='25' height='25'
								onclick=\"EliminarConvenio('$fila[0]')\"  /> ";}else{$img='';}
		   $tbl='';$i=0;
		    $buscar=$_POST['buscar'];
		    $listar=$ogrupo->ListarConv($buscar);
			 while ($fila=$listar->fetch()){$i++;
			  $id='IdtblGrupo_'.$i;
			  if($fila[4]=='P'){$tipo='PARTICULAR';}if($fila[4]=='C'){$tipo='CONVENIO';}
			  if($fila[5]=='E'){$tari='EMPRESARIAL';}if($fila[5]=='S'){$tari='SEGUS';}
			  if($i%2==0){$color="style='height:35px; background-color:#f5f5f5'";}
			   else{$color="style='height:35px; background-color:#FFFFFF; '";}
				$tbl.="<tr $color id='$id' onclick=\"javascript:PintarFila('$id')\" idgru='$fila[0]' nombre='$fila[1]' ruc='$fila[2]'
				direccion='$fila[3]' tipo_conv='$fila[4]' tipo_tarifario='$fila[5]' factor='$fila[6]' p='$fila[8]' >
				            <td align='center' width='5%' style='font-size:10px' >&nbsp;&nbsp;$i</td>
							<td width='20%' style='font-size:10px'>&nbsp;&nbsp;$fila[1]</td>
							<td width='10%' style='font-size:10px'>&nbsp;&nbsp;$fila[2]</td>
							<td width='25%' style='font-size:10px'>&nbsp;&nbsp;$fila[3]</td>
							<td width='10%' style='font-size:10px'>&nbsp;&nbsp;$tipo</td>
							<td width='10%' style='font-size:10px'>&nbsp;&nbsp;$tari</td>
							<td width='10%' style='font-size:10px'>&nbsp;&nbsp;$fila[6]</td>
							<td width='4%' style='font-size:10px' align='center'>$img</td>
				        </tr>";
				}
			echo $tbl; 
		 }
		 
		 
	
	
		
		if($accion=='NUEVO_CONV'){
			$id=$_POST['id'];
			$nombre=$_POST['nombre'];
			$valor=$_POST['valor'];
			$ruc=$_POST['ruc'];
			$direccion=$_POST['direccion'];
			$tipo_conv=$_POST['tipo_conv'];
			$tipo_tarifario=$_POST['tipo_tarifario'];
			$factor=$_POST['factor'];
			$pass=$_POST['pass'];
			
			if($tipo_conv=='P'){
			  $maxcorrelativo=$ogrupo->MaxRucCorrelativoPart();
			   while($fi=$maxcorrelativo->fetch()){$ruc=$fi[0];}	
			}
			
			if ($valor==1){
			    // si el valor es igual a 1 insertamos
				     $pass=md5($_POST['pass']);
				     $insertar=$ogrupo->RegistrarConvenio($nombre,$ruc,$direccion,$tipo_conv,$tipo_tarifario,$factor,$pass);
			         if ($insertar->rowCount()==0){echo 0; exit;}
					 else{
						 $maxid=$ogrupo->MaxIdConvenio();
						 while($col=$maxid->fetch()){$ultimo_id=$col[0];}
						 $ogrupo->RegistrarPreciosConvenio($ultimo_id,$tipo_tarifario);
						 echo 1; exit;}   
			}
			if ($valor==2){
				    if(strlen($_POST['pass'])==32){$pass=$_POST['pass'];}else{$pass=md5($_POST['pass']);}
				// si el valor es igual a 2 modificamos
				    $modificar=$ogrupo->ModificarConvenio($id,$nombre,$ruc,$direccion,$tipo_conv,$tipo_tarifario,$factor,$pass);
			        if ($modificar->rowCount()==0){echo 0;}else{echo 1;}	
			}
			
		}
		
		if($accion=='ELIMINAR'){
			$id=$_POST['id'];
			$eliminar = $ogrupo->Eliminar($id);		
		}
	    if($accion=='LISGRU'){
			$tbl="";
			$listar=$ogrupo->Listar("");
			$can=$listar->rowCount();
			if($can==0){
			  $tbl="<select id='grupo' class='form-control' style='height:30px' ><option> Seleccione</option> </select>";exit;
			 }else{
				$tbl="<select id='grupo' class='form-control' style='height:30px' >";
		      while($fila=$listar->fetch()){
				  $tbl.="<option value='$fila[0]'>$fila[1]</option>";
			   }
			     $tbl.="</select>";
			 }
			 echo $tbl;
	    }
	   
	   if($accion=="LLENAR"){
		$tbl="";
		$id=$_POST['id'];
		$tbl="<option value='0'></option>";
		$listar=$ogrupo->Listar();
		while($fila=$listar->fetch()){
		   if($id==$fila[0]){$selec="selected='selected'";}else{$selec="";}
		    $familia=$fila[1];
		    $tbl.="<option value='$fila[0]' $selec >$familia</option>";  
		 }
		echo $tbl;
	  }
	  
	  
	  
	   if($accion=='CONSULTA_RUC'){
        require_once('../sunat/src/autoload.php');
		$company = new \Sunat\Sunat( false, false );
        $ruc = $_POST['ruc'];
		$search1 = $company->search( $ruc );
	    $info = json_decode($search1->json(),true);
		if($info['success']==false){echo 0;exit;}

		$datos = array(
	        0 => $info['result']['ruc'], 
	        1 => $info['result']['razon_social'],
	        2 => $info['result']['direccion'],
           );
		echo json_encode($datos);
		}
	
	
	 
	  if($accion=='ELI_CONV'){
			 $id=$_POST['id'];   
			 $eliminar=$ogrupo->EliminarConv($id);
			 if($eliminar->rowCount()==0){echo 0;exit;}
			 else{ $ogrupo->EliminarConvPrecios($id);
				 echo 1;exit;}
		  }
	  
	  
	  
	 
	}
?>