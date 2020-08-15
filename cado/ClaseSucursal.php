<?php

require_once('conexion.php');

class Sucursal {

    function Listar($nombre) {
        $ocado = new cado();
        $sql = "select * from sucursal  where nombre like '%$nombre%' ";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

    function Registrar($nombre, $departamento, $provincia, $distrito, $direccion, $telefono, $representante, $dni, $cell) {
        $ocado = new cado();
        $sql = "insert into sucursal(nombre,estado,logo,departamento,provincia,distrito,direccion,telefono,representante,dni,cell) 
                values('$nombre','0',null,'$departamento','$provincia','$distrito','$direccion','$telefono','$representante','$dni','$cell')";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

    function Editar($id, $nombre, $estado, $departamento, $provincia, $distrito, $direccion, $telefono, $representante, $dni, $cell) {
        $ocado = new cado();
        $sql = "update sucursal set nombre='$nombre' , estado='$estado', departamento='$departamento',provincia='$provincia',distrito='$distrito',direccion='$direccion', 
          telefono='$telefono',representante='$representante',dni='$dni',cell='$cell' where id=$id ";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

    function Eliminar($id) {
        $ocado = new cado();
        $sql = "delete from sucursal where id = $id";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

}
