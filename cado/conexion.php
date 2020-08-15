<?php 
 class cado{
	  function conectar(){
	   try {
		//date_default_timezone_set('America/Lima');
//	   $db = new PDO('mysql:host=localhost;dbname=singapur_db','singapur_adm','singapur1$');
	   $db = new PDO('mysql:host=localhost;dbname=singapur_db','root','');
	   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   $db->query("SET NAMES 'utf8'");
		 return $db;
		 }catch (PDOException $e) {
			 //print "¡Error!: " . $e->getMessage();die('ok');
			 
	       echo $e->getMessage();
          }
	  }
	  function ejecutar($isql){
		  $conexion=$this->conectar();
	      $ejecutar=$conexion->prepare($isql);
		  $ejecutar->execute();
		  $conexion=null;
		  return $ejecutar;
	  }
	  function conectar2(){
	   try {
		date_default_timezone_set('America/Lima');
$db = new PDO('mysql:host=localhost;dbname=bd_singapur','singapur_adm','singapur1$',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 return $db;
		 }catch (PDOException $e) {
	       echo $e->getMessage();
          }
	  }
	   function ejecutar2($isql){
		  $conexion=$this->conectar2();
	      $ejecutar=$conexion->prepare($isql);
		  $ejecutar->execute();
		  $conexion=null;
		  return $ejecutar;
	  }

   }
?>