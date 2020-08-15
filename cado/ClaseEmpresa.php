<?php
require_once ("conexion.php");

Class Empresa{

    function Listar(){
        $ocado=new cado();
        $sql="select * from empresa  ";
        $ejecutar=$ocado->ejecutar($sql);
        return $ejecutar;
      }
          
      function Registrar($nombre,$ruc,$estado,$direccion,$telefono,$pass,$representante,$dni,$cell){
            $ocado=new cado();
            $sql="insert into empresa(nombre,ruc,estado,direccion,telefono,pass,representante,dni,cell) 
                  values('$nombre','$ruc','$estado','$direccion','$telefono','$pass','$representante','$dni','$cell')";
            $ejecutar=$ocado->ejecutar($sql);
            return $ejecutar;
       }
       
        function Editar($id,$ruc,$nombre,$estado,$direccion,$telefono,$pass,$representante,$dni,$cell){
            $ocado=new cado();
            $sql="update empresa set nombre='$nombre' ,ruc='$ruc' ,pass='$pass', estado='$estado',direccion='$direccion', 
            telefono='$telefono',representante='$representante',dni='$dni',cell='$cell' where id=$id ";
            $ejecutar=$ocado->ejecutar($sql);
            return $ejecutar;
       }
      function Eliminar($id){
          $ocado=new cado();
          $sql="delete from empresa where id = $id";
          $ejecutar=$ocado->ejecutar($sql);
          return $ejecutar;
       } 

 }

?>