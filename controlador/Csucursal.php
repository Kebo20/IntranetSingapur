<?php  session_start();
    require_once('../cado/ClaseSucursal.php'); 
    require_once('../cado/ClaseUbigeo.php'); 
    
    $osucursal=new Sucursal();
    
    switch ($_POST["accion"]) {

    
    case "LISTAR":
       
        $tbl = '';
        $i = 0;
        $buscar = $_POST['buscar'];
        $listar = $osucursal->Listar($buscar);
        
        $oubigeo=new Ubigeo();
        
        
        while ($fila = $listar->fetch()) {
            $i++;
            $id = 'IdtblSucursal_' . $i;
            if ($fila[2] == 0) {
                $check = "checked='checked'";
            } else {
                $check = '';
            }
            if ($i % 2 == 0) {
                $color = "style=' background-color:#f5f5f5; height:15px;'";
            } else {
                $color = "style='background-color:#FFFFFF; height:15px;'";
            }
            
            $departamentos=$oubigeo->nombre_departamento("$fila[4]");
            $nombre_departamento='';
            foreach($departamentos as $departamento){
                 $nombre_departamento=$departamento[0];
            }
            $provincias=$oubigeo->nombre_provincia("$fila[5]");
            $nombre_provincia='';
            foreach($provincias as $provincia){
                 $nombre_provincia=$provincia[0];
            }
            $distritos=$oubigeo->nombre_distrito("$fila[6]");
            $nombre_distrito='';
            foreach($distritos as $distrito){
                 $nombre_distrito=$distrito[0];
            }
            
            $tbl .= "<tr $color id='$id' onclick=\"javascript:PintarFila('$id')\" idsuc=$fila[0] nombre='$fila[1]' estado='$fila[2]'  departamento='$fila[4]' 
				 provincia='$fila[5]' distrito='$fila[6]' direccion='$fila[7]' telefono='$fila[8]' representante='$fila[9]' dni='$fila[10]'  cell='$fila[11]' >
				            <td class='center' width='9%' style='font-size:11px' >$i</td>
							<td width='9%' style='font-size:11px'>&nbsp;&nbsp;$fila[1]</td>
							<td width='9%'  style='font-size:11px'>&nbsp;&nbsp;$nombre_departamento</td>
							<td class='center' width='9%' style='font-size:11px'>&nbsp;&nbsp;$nombre_provincia</td>
							<td class='center' width='9%' style='font-size:11px'>&nbsp;&nbsp; $nombre_distrito</td>
							<td class='center' width='9%'  style='font-size:11px'>&nbsp;&nbsp;$fila[7]</td>
							<td class='center' width='9%' style='font-size:11px'>&nbsp;&nbsp;$fila[8]</td>
							<td class='center' width='9%' style='font-size:11px'>&nbsp;&nbsp;$fila[9]</td>
							<td class='center' width='9%' style='font-size:11px'>&nbsp;&nbsp;$fila[10]</td>
							<td class='center' width='9%' style='font-size:11px'>&nbsp;&nbsp;$fila[11]</td>
							<td class='center' width='9%' ><input type='checkbox' $check disabled='disabled'  /></td>
				        </tr>";
        }
        echo $tbl;
        
        break;
        
        case 'nuevo':
            
            $osucursalR=new Sucursal();
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
           
            $departamento = $_POST["departamento"];
            $provincia = $_POST["provincia"];
            $distrito = $_POST["distrito"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $representante = $_POST["representante"];
            $cell = $_POST["cell"];
            $dni=$_POST["dni"];
            
            $valor=$_POST["valor"];
            
            if($valor=='1'){
                $insertar=$osucursalR->Registrar($nombre,$departamento,$provincia,$distrito,$direccion,$telefono,$representante,$dni,$cell);
                if ($insertar->rowCount()==0){echo 0;}else{echo 1;}; exit; 
                
			}
			    
            
            
            if($valor=='2'){
               $modificar= $osucursalR->Editar($id,$nombre,$estado,$departamento,$provincia,$distrito,$direccion,$telefono,$representante,$dni,$cell);
               if ($modificar->rowCount()==0){echo 0;}else{echo 1;} 
            }
            
             
            break;
            
        case 'editar':
            
            $osucursalE=new Sucursal();
            
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $estado = $_POST["estado"];
            $departamento = $_POST["departamento"];
            $provincia = $_POST["provincia"];
            $distrito = $_POST["distrito"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $representante = $_POST["representante"];
            $dni=$_POST["dni"];
            $cell = $_POST["cell"];
            
             $osucursalE->Editar($id,$nombre,$estado,$departamento,$provincia,$distrito,$direccion,$telefono,$representante,$dni,$cell);
            break;
            
        case 'eliminar':
            $osucursalEl=new Sucursal();
            
            $id = $_POST["id"];
            $osucursalEl->Eliminar($id);
            break;
        
    }
	