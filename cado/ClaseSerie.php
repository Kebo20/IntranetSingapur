<?php
   require_once('conexion.php');
   
   class Series{
	   
    function Listar($nombre){
	  $ocado=new cado();
	  $sql="select * from serie where tipo_doc<>'OR' order by serie asc";
	  $ejecutar=$ocado->ejecutar($sql);
	  return $ejecutar;
	}
	function ListarDesocupado(){
	  $ocado=new cado();
	  $sql="select * from serie where tipo_doc<>'OR' and id not in(select id_serie from caja_series )";
	  $ejecutar=$ocado->ejecutar($sql);
	  return $ejecutar;
	}
	
	function Registrar($serie,$tipo_doc){
		  $ocado=new cado();
          $sql="insert into serie(tipo_doc,serie,correlativo) values('$tipo_doc','$serie',0)";
		  $ejecutar=$ocado->ejecutar($sql);
		  return $ejecutar;
	 } 
	function Modificar($id,$serie,$tipo_doc){
		  $ocado=new cado();
          $sql="update serie 
		          set serie='$serie',tipo_doc='$tipo_doc'
				where id=$id";
		  $ejecutar=$ocado->ejecutar($sql);
		  return $ejecutar;
	 }
	function ValSer($serie,$tipo_doc){
	  $ocado=new cado();
	  $sql="select count(*) from serie  where serie='$serie' and tipo_doc='$tipo_doc'";
	  $ejecutar=$ocado->ejecutar($sql);
	  return $ejecutar;
	}	
	function GenerarDoc($user,$tipo_doc){
	  $ocado=new cado();
	  $sql="select ser.serie,LPAD(ser.correlativo+1,8,0)cor from usuario  u inner join caja_fondos c on u.id=c.id_user and c.activo=1 
	                                 inner join caja ca on c.id_caja=ca.id
									 inner join caja_series cs on ca.id=cs.id_caja
									 inner join serie ser on cs.id_serie=ser.id and ser.tipo_doc='$tipo_doc'
	        where u.user='$user' ";
	  $ejecutar=$ocado->ejecutar($sql);
	  return $ejecutar;
	} 
   }
?>