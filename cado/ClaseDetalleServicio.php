<?php

require_once 'conexion.php';
class DetalleServicio {
      function Listar($servicio) {
        $ocado = new cado();
        $sql = "select * from detalle_servicio where id_servicio=$servicio ";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

    function Registrar($nombre,$servicio) {
        $ocado = new cado();
        $sql = "insert into detalle_servicio(nombre,id_servicio) 
                  values('$nombre','$servicio')";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

    function Editar($id,$nombre) {
        $ocado = new cado();
        $sql = "update detalle_servicio set nombre='$nombre'  where id=$id ";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }

    function Eliminar($id) {
        $ocado = new cado();
        $sql = "delete from detalle_servicio where id = $id";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }
    function EliminarxServicio($id) {
        $ocado = new cado();
        $sql = "delete from detalle_servicio where id_servicio = $id";
        $ejecutar = $ocado->ejecutar($sql);
        return $ejecutar;
    }
}
