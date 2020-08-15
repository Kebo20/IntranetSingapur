<?php

require_once ("conexion.php");

class Servicio {

    function Listar() {
        $ocado = new cado();
        $sql = "select * from servicio ";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }
    function nombre($id) {
        $ocado = new cado();
        $sql = "select nombre from servicio where id=$id";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

    function Registrar($nombre,$estado) {
        $ocado = new cado();
        $sql = "insert into servicio(nombre,estado) 
                  values('$nombre','$estado')";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

    function Editar($id,$nombre, $estado) {
        $ocado = new cado();
        $sql = "update servicio set nombre='$nombre' , estado='$estado' where id=$id ";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

    function Eliminar($id) {
        $ocado = new cado();
        $sql = "delete from servicio where id = $id";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

}
